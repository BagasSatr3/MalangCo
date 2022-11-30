<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\AlamatPengiriman;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\CartDetail;
use App\Models\Setting;

class UserController extends Controller
{
    public function index(Request $request) {
        $itemuser = $request->user();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            
        }else{
            $wishcount = 0;
            
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
                    
                    'setting' => $setting);
        return view('user.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    
}