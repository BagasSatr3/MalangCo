<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Slideshow;
use App\Models\ProdukPromo;
use App\Models\Wishlist;
use App\Models\CartDetail;
use App\Models\Setting;
use App\Models\SettingDev;
use App\Models\Comment;
use Auth;

class HomepageController extends Controller
{
    public function index(Request $request) {
        $itemuser = $request->user();
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(3)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(3)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Kojo',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'itemslide' => $itemslide,
            'wishcount' => $wishcount,
            'cartcount' => $cartcount,
            'setting' => $setting
        );
        return view('homepage.index', $data);
    }

    public function item(Request $request) {
        $itemuser = $request->user();
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(6)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Kojo',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'itemslide' => $itemslide,
            'wishcount' => $wishcount,
            'cartcount' => $cartcount,
            'setting' => $setting
        );
        return view('homepage.item', $data);
    }

    public function about(Request $request) {
        $itemuser = $request->user();
        $setting = Setting::first();
        $dev = SettingDev::get();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'About',
                    'setting' => $setting,
                    'dev' => $dev,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount,);
        return view('homepage.about', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    public function kontak(Request $request) {
        $itemuser = $request->user();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Contact',
                    'setting' => $setting,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount,);
        return view('homepage.kontak', $data);
    }

    public function kategori(Request $request) {
        $itemuser = $request->user();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Product Category',
                    'itemkategori' => $itemkategori,
                    'itemproduk' => $itemproduk,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount,
                    'setting' => $setting);
        return view('homepage.kategori', $data);
    }

    public function kategoribyslug(Request $request, $slug) {
        $itemuser = $request->user();
        $itemproduk = Produk::orderBy('nama_produk', 'desc')
                            ->where('status', 'publish')
                            ->whereHas('kategori', function($q) use ($slug) {
                                $q->where('slug_kategori', $slug);
                            })
                            ->paginate(18);
        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();
        $itemkategori = Kategori::where('slug_kategori', $slug)
                                ->where('status', 'publish')
                                ->first();
        $setting = Setting::first();
        if ($itemkategori) {
            if(isset($itemuser)){
                $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
                $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
            }else{
                $wishcount = 0;
                $cartcount = 0;
            }
            $data = array('title' => $itemkategori->nama_kategori,
                        'itemproduk' => $itemproduk,
                        'listkategori' => $listkategori,
                        'itemkategori' => $itemkategori,
                        'wishcount' => $wishcount,
                        'cartcount' => $cartcount,
                        'setting' => $setting);
            return view('homepage.produk', $data)->with('no', ($request->input('page') - 1) * 18);            
        } else {
            return abort('404');
        }
    }

    public function produk(Request $request) {
        $search = $request->query('q');
        $itemuser = $request->user();
        $setting = Setting::first();
        if($search == 'low-to-high'){
            $product_search = Produk::orderBy('harga', 'asc')->where('status', 'publish')->paginate(18);
        }elseif($search == 'high-to-low'){
            $product_search = Produk::orderBy('harga', 'desc')->where('status', 'publish')->paginate(18);
        }elseif($search == 'lastest-products'){
            $product_search = Produk::orderBy('created_at', 'desc')->where('status', 'publish')->paginate(18);
        }elseif($search == 'a-z-products'){
            $product_search = Produk::orderBy('nama_produk', 'asc')->where('status', 'publish')->paginate(18);
        }elseif($search == 'z-a-products'){
            $product_search = Produk::orderBy('nama_produk', 'desc')->where('status', 'publish')->paginate(18);
        }
        else{
            $product_search = Produk::orderBy('created_at', 'desc')
                                    ->where('status', 'publish')
                                    ->where('nama_produk', 'LIKE','%'.$search.'%')
                                    ->get();
        }

        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $data = array('title' => 'Product',
                    'itemproduk' => $product_search,
                    'listkategori' => $listkategori,
                    'wishcount' => $wishcount,
                    'cartcount' => $cartcount,
                    'setting' => $setting
                );
        return view('homepage.produk', $data)->with('no', ($request->input('page') - 1) * 18);
    }

    public function produkdetail(Request $request, $id) {
        $itemuser = $request->user();
        $itemproduk = Produk::where('slug_produk', $id)
                            ->where('status', 'publish')
                            ->first();
        $setting = Setting::first();
        if(isset($itemuser)){
            $wishcount = Wishlist::where('user_id', $itemuser->id)->get()->count();
            $cartcount = CartDetail::where('user_id', $itemuser->id)->get()->count();
        }else{
            $wishcount = 0;
            $cartcount = 0;
        }
        $comments = Comment::get();
        if ($itemproduk) {
            if (Auth::user()) {//cek kalo user login 
                $itemuser = Auth::user();
                $itemwishlist = Wishlist::where('produk_id', $itemproduk->id)
                                        ->where('user_id', $itemuser->id)
                                        ->first();
                $data = array('title' => $itemproduk->nama_produk,
                        'itemproduk' => $itemproduk,
                        'wishcount' => $wishcount,
                        'cartcount' => $cartcount,
                        'itemwishlist' => $itemwishlist,
                        'comments' => $comments);
            } else {
                $data = array('title' => $itemproduk->nama_produk,
                            'itemproduk' => $itemproduk,
                            'wishcount' => $wishcount,
                            'cartcount' => $cartcount,
                            'comments' => $comments);
            }
            return view('homepage.produkdetail', $data);            
        } else {
            // kalo produk ga ada, jadinya tampil halaman tidak ditemukan (error 404)
            return abort('404');
        }
    }
}