<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Image;
use App\Models\ProdukImage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Product',
                    'itemproduk' => $itemproduk);
        return view('produk.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $data = array('title' => 'Form New Product',
                    'itemkategori' => $itemkategori);
        return view('produk.create', $data);
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
            'kode_produk' => 'required|unique:produk',
            'nama_produk' => 'required',
            'slug_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_id' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric'
        ]);
        $itemuser = $request->user();//ambil data user yang login
        $slug = \Str::slug($request->slug_produk);//buat slug dari input slug produk
        $inputan = $request->all();
        $inputan['slug_produk'] = $slug;
        $inputan['user_id'] = $itemuser->id;
        $inputan['status'] = 'publish';
        $itemproduk = Produk::create($inputan);
        notify()->success('Data Save Successfully');
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $data = array('title' => 'Product Image',
                'itemproduk' => $itemproduk);
        return view('produk.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemproduk = Produk::findOrFail($id);
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        $data = array('title' => 'Form Edit Product',
                'itemproduk' => $itemproduk,
                'itemkategori' => $itemkategori);
        return view('produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_produk' => 'required|unique:produk,id,'.$id,
            'nama_produk' => 'required',
            'slug_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_id' => 'required',
            'qty' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric'
        ]);
        $itemproduk = Produk::findOrFail($id);
        // kalo ga ada error page not found 404
        $slug = \Str::slug($request->slug_produk);//slug kita gunakan nanti pas buka produk
        // kita validasi dulu, biar tidak ada slug yang sama
        $validasislug = Produk::where('id', '!=', $id)//yang id-nya tidak sama dengan $id
                                ->where('slug_produk', $slug)
                                ->first();
        if ($validasislug) {
            notify()->error('Slug already exists, try something else');
            return back();
        } else {
            $inputan = $request->all();
            $inputan['slug'] = $slug;
            $itemproduk->update($inputan);
            notify()->success('Data successfully updated');
            return redirect()->route('produk.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemproduk = Produk::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        if ($itemproduk->delete()) {
            notify()->success('Data deleted successfully');
            return back();
        } else {
            notify()->error('Data failed to delete');
            return back();
        }
    }
    public function uploadimage(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Produk::where('user_id', $itemuser->id)
                                ->where('id', $request->produk_id)
                                ->first();
        if ($itemproduk) {
            $fileupload = $request->file('image');
            $folder = 'assets/images';
            $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
            // simpan ke table produk_images
            $inputan = $request->all();
            $inputan['foto'] = $itemgambar->url;//ambil url file yang barusan diupload
            // simpan ke produk image
            ProdukImage::create($inputan);
            // update banner produk
            $itemproduk->update(['foto' => $itemgambar->url]);
            // end update banner produk
            notify()->success('Image uploaded successfully');
            return back();
        } else {
            notify()->error('Category not found');
            return back();
        }
    }

    public function deleteimage(Request $request, $id) {
        // ambil data produk image by id
        $itemprodukimage = ProdukImage::findOrFail($id);
        // ambil produk by produk_id kalau tidak ada maka error 404
        $itemproduk = Produk::findOrFail($itemprodukimage->produk_id);
        // kita cari dulu database berdasarkan url gambar
        $itemgambar = Image::where('url', $itemprodukimage->foto)->first();
        // hapus imagenya
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
        }
        // baru update hapus produk image
        $itemprodukimage->delete();
        //ambil 1 buah produk image buat diupdate jadi banner produk
        $itemsisaprodukimage = ProdukImage::where('produk_id', $itemproduk->id)->first();
        if ($itemsisaprodukimage) {
            $itemproduk->update(['foto' => $itemsisaprodukimage->foto]);
        } else {
            $itemproduk->update(['foto' => null]);
        }
        //end update jadi banner produk
        notify()->success('Data deleted successfully');
        return back();
    }
    public function loadasync($id) {
        $itemproduk = Produk::findOrFail($id);
        $respon = [
            'status' => 'success',
            'msg' => 'Data found',
            'itemproduk' => $itemproduk
        ];
        return response()->json($respon, 200);
    }


}