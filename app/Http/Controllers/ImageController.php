<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(Request $request) {
        $itemuser = $request->user();
        $itemgambar = Image::where('user_id', $itemuser->id)->paginate(20);
        $data = array('title' => 'Data Image',
                    'itemgambar' => $itemgambar);
        return view('image.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $itemuser = $request->user();
        $fileupload = $request->file('image');
        $folder = 'assets/images';
        $itemgambar = $this->upload($fileupload, $itemuser, $folder);
        // $inputan = $request->all();
        // $inputan['user_id'] = $itemuser->id;
        // Image::create($inputan);
        notify()->success('Image uploaded successfully');
        return back();
    }

    public function destroy(Request $request, $id) {
        $itemuser = $request->user();
        $itemgambar = Image::where('user_id', $itemuser->id)
                            ->where('id', $id)
                            ->first();
        if ($itemgambar) {
            \Storage::delete($itemgambar->url);
            $itemgambar->delete();
            notify()->success('Data deleted successfully');
            return back();
        } else {
            notify()->error('Data not found');
            return back();
        }
    }
    
    public function upload($fileupload, $itemuser, $folder) {
        $path = $fileupload->store('files');
        $inputangambar['url'] = $path;
        $inputangambar['user_id'] = $itemuser->id;
        return Image::create($inputangambar);
    }
}