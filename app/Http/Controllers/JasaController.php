<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jasa;
use App\Models\Image;
use App\Models\JasaImage;

class JasaController extends Controller
{
    public function index(Request $request)
    {
        $itemjasa = Jasa::orderBy('created_at', 'desc')->paginate(20);
        $data = array('title' => 'Jasa',
                    'itemjasa' => $itemjasa);
        return view('jasa.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    public function create()
    {
        $data = array('title' => 'Form Jasa Baru',);
        return view('jasa.create', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_jasa' => 'required|unique:jasa',
            'nama_jasa' => 'required',
            'slug_jasa' => 'required',
            'deskripsi_jasa' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);
        $itemuser = $request->user();//ambil data user yang login
        $slug = \Str::slug($request->slug_jasa);//buat slug dari input slug jasa
        $inputan = $request->all();
        $inputan['slug_jasa'] = $slug;
        $inputan['user_id'] = $itemuser->id;
        $inputan['status'] = 'publish';
        $itemjasa = Jasa::create($inputan);
        return redirect()->route('jasa.index')->with('success', 'Data berhasil disimpan');
    }
    public function show($id)
    {
        $itemjasa = Jasa::findOrFail($id);
        $data = array('title' => 'Foto Jasa',
                'itemjasa' => $itemjasa);
        return view('jasa.show', $data);
    }
    public function edit($id)
    {
        $itemjasa = Jasa::findOrFail($id);
        $data = array('title' => 'Form Edit Jasa',
                'itemjasa' => $itemjasa,);
        return view('jasa.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_jasa' => 'required|unique:jasa,id,'.$id,
            'nama_jasa' => 'required',
            'slug_jasa' => 'required',
            'deskripsi_jasa' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric'
        ]);
        $itemjasa = Jasa::findOrFail($id);
        // kalo ga ada error page not found 404
        $slug = \Str::slug($request->slug_jasa);//slug kita gunakan nanti pas buka jasa
        // kita validasi dulu, biar tidak ada slug yang sama
        $validasislug = Jasa::where('id', '!=', $id)//yang id-nya tidak sama dengan $id
                                ->where('slug_jasa', $slug)
                                ->first();
        if ($validasislug) {
            return back()->with('error', 'Slug sudah ada, coba yang lain');
        } else {
            $inputan = $request->all();
            $inputan['slug'] = $slug;
            $itemjasa->update($inputan);
            return redirect()->route('jasa.index')->with('success', 'Data berhasil diupdate');
        }
    }
    public function destroy($id)
    {
        $itemjasa = Jasa::findOrFail($id);//cari berdasarkan id = $id, 
        // kalo ga ada error page not found 404
        if ($itemjasa->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
    public function uploadimage(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jasa_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemjasa = Jasa::where('user_id', $itemuser->id)
                                ->where('id', $request->jasa_id)
                                ->first();
        if ($itemjasa) {
            $fileupload = $request->file('image');
            $folder = 'assets/images';
            $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
            // simpan ke table produk_images
            $inputan = $request->all();
            $inputan['foto'] = $itemgambar->url;//ambil url file yang barusan diupload
            // simpan ke produk image
            JasaImage::create($inputan);
            // update banner produk
            $itemjasa->update(['foto' => $itemgambar->url]);
            // end update banner produk
            return back()->with('success', 'Image berhasil diupload');
        }
    }
    public function deleteimage(Request $request, $id) {
        // ambil data produk image by id
        $itemjasaimage = JasaImage::findOrFail($id);
        // ambil produk by produk_id kalau tidak ada maka error 404
        $itemjasa = Jasa::findOrFail($itemjasaimage->jasa_id);
        // kita cari dulu database berdasarkan url gambar
        $itemgambar = Image::where('url', $itemjasaimage->foto)->first();
        // hapus imagenya
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
        }
        // baru update hapus jasa image
        $itemjasaimage->delete();
        //ambil 1 buah jasa image buat diupdate jadi banner jasa
        $itemsisajasaimage = JasaImage::where('jasa_id', $itemjasa->id)->first();
        if ($itemsisajasaimage) {
            $itemjasa->update(['foto' => $itemsisajasaimage->foto]);
        } else {
            $itemjasa->update(['foto' => null]);
        }
        //end update jadi banner produk
        return back()->with('success', 'Data berhasil dihapus');
    }
    public function loadasync($id) {
        $itemjasa = Jasa::findOrFail($id);
        $respon = [
            'status' => 'success',
            'msg' => 'Data ditemukan',
            'itempjasa' => $itempjasa
        ];
        return response()->json($respon, 200);
    }
}
