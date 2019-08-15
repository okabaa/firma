<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function get_index(){
        return view('backend.index');
    }

    public function get_ayarlar(){
        return view('backend.ayarlar');
    }

    public function post_ayarlar(Request $request){
        Ayarlar::create($request->all());
    }
}