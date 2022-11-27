<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\CartDetail;
use App\Models\Setting;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $setting = Setting::first();
        $itemwishlist = Wishlist::where('user_id', $itemuser->id)
                                ->paginate(10);
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(3)->get();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Wishlist',
                    'itemwishlist' => $itemwishlist,
                    'itemproduk' => $itemproduk,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount,
                    'setting' => $setting);
        return view('wishlist.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $validasiwishlist = Wishlist::where('produk_id', $request->produk_id)
                                    ->where('user_id', $itemuser->id)
                                    ->first();
        if ($validasiwishlist) {
            $validasiwishlist->delete();
            notify()->success('Wishlist deleted successfully');//kalo udah ada, berarti wishlist dihapus
            return back();
        } else {
            $inputan = $request->all();
            $inputan['user_id'] = $itemuser->id;
            $itemwishlist = Wishlist::create($inputan);
            notify()->success('Product successfully added to wishlist');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemwishlist = Wishlist::findOrFail($id);
        if ($itemwishlist->delete()) {
            notify()->success('Wishlist deleted successfully');
            return back();
        } else {
            notify()->success('Wishlist failed to delete');
            return back();
        }
    }
}