<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    public function index(){
        return view('upload.upload');
    }
    public function showUploadFile(Request $request){
    }

    public function store(Request $request) {
//        echo 'this is store function';
//        dd($request);
        if($request->hasFile('image')) {
            $file =$request->file('image');
            $extension = $file->extension();
//            dd($file->extension());
            Storage::put('avatar.'.$extension, $request->file('image'));
            $fil = Storage::get('avatar');
            dd($fil);
//            return $path;
//            dd($file);
//            $path = $file->store('upload');
//            echo $path;
        }
    }

    public function get($filename){

        $file = Storage::disk('public')->get($filename);
//        dd($file);
        return $file;
//        return (new Response($file, 200))
//            ->header('Content-Type', 'image/png');
    }

    public function show() {
        return Storage::files;
    }
}
