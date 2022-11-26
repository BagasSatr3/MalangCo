<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\AlamatPengiriman;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\CartDetail;

class UserController extends Controller
{
    public function index(Request $request) {
        $itemuser = $request->user();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        if ($itemuser->role == 'admin') {
            // kalo admin maka menampilkan semua cart
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        } else {
            // kalo member maka menampilkan cart punyanya sendiri
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'checkout');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        }
        $data = array('title' => 'User Profile',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount);
        return view('user.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        $title = 'Setting';
        if($setting){
            // Update data
            $setting->update([
                'website_name' => $request->website_name ?? '', 
                'website_url' => $request->website_url ?? '',
                'page_title' => $request->page_title ?? '',
                'meta_keyword' => $request->meta_keyword ?? '',
                'meta_description' => $request->meta_description ?? '',
                'address' => $request->address ?? '',
                'phone1' => $request->phone1 ?? '',
                'phone2' => $request->phone2 ?? '',
                'email1' => $request->email1 ?? '',
                'email2' => $request->email2 ?? '',
                'facebook' => $request->facebook ?? '',
                'twitter' => $request->twitter ?? '',
                'instagram' => $request->instagram ?? '',
                'youtube' => $request->youtube ?? '',
                'name_dev' => $request->name_dev ?? '',
                'job_dev' => $request->name_dev ?? '',
                'foto_dev' => $request->name_dev ?? '',
                'desc_dev' => $request->name_dev ?? '',
            ]);
            notify()->success('Settings Saved');
            return redirect()->back();
        }else {
            // Create Data
            Setting::create([
                'website_name' => $request->website_name ?? '', 
                'website_url' => $request->website_url ?? '',
                'page_title' => $request->page_title ?? '',
                'meta_keyword' => $request->meta_keyword ?? '',
                'meta_description' => $request->meta_description ?? '',
                'address' => $request->address ?? '',
                'phone1' => $request->phone1 ?? '',
                'phone2' => $request->phone2 ?? '',
                'email1' => $request->email1 ?? '',
                'email2' => $request->email2 ?? '',
                'facebook' => $request->facebook ?? '',
                'twitter' => $request->twitter ?? '',
                'instagram' => $request->instagram ?? '',
                'youtube' => $request->youtube ?? '',
                'name_dev' => $request->name_dev ?? '',
                'job_dev' => $request->name_dev ?? '',
                'foto_dev' => $request->name_dev ?? '',
                'desc_dev' => $request->name_dev ?? '',
            ]);
            notify()->success('Settings Created');
            return redirect()->back();
        }
    }
}