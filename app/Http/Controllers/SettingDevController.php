<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingDev;

class SettingDevController extends Controller
{
    public function index(Request $request)
    {
        $itemdev = SettingDev::paginate();
        $data = array('title' => 'Add Developer',
                    'itemdev' => $itemdev);
        return view('setting.dev', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // ambil data user yang login
        $itemuser = $request->user();
        // masukkan data yang dikirim ke dalam variable $inputan
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        // ambil url foto yang diupload
        $fileupload = $request->file('image');
        $folder = 'assets/images';
        $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
        // masukkan url yang telah diupload ke $inputan
        $inputan['foto'] = $itemgambar->url;
        $itemdev = SettingDev::create($inputan);
        notify()->success('Image uploaded successfully');
        return back();
    }
    public function destroy($id)
    {
        $itemdev = SettingDev::findOrFail($id);
        // cek kalo foto bukan null
        if ($itemdev->foto != null) {
            \Storage::delete($itemdev->foto);
        }
        if ($itemdev->delete()) {
            notify()->success('Data deleted successfully');
            return back();
        } else {
            notify()->error('Data failed to delete');
            return back();
        }
    }
}
