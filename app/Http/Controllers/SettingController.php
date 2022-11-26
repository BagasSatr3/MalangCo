<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Setting;
use Auth;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        $data = array('title' => 'Homepage Setting',
                    'setting' => $setting);
        return view('setting.index', $data);
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

            return redirect()->back()->with('message','Settings Saved');
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

            return redirect()->back()->with('message','Settings Created');
        }
    }
    // public function upload(Request $request)
    // {
    //     $this->validate($request, [
    //         'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
    //     // ambil data user yang login
    //     $itemuser = $request->user();
    //     // masukkan data yang dikirim ke dalam variable $inputan
    //     $inputan = $request->all();
    //     $inputan['user_id'] = $itemuser->id;
    //     // ambil url foto yang diupload
    //     $fileupload = $request->file('image');
    //     $folder = 'assets/images';
    //     $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
    //     // masukkan url yang telah diupload ke $inputan
    //     $inputan['foto_dev'] = $itemgambar->url;
    //     $setting = Setting::create($inputan);
    //     return back()->with('success', 'Image uploaded successfully');
    // }
}
