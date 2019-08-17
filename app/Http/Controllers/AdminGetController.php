<?php

namespace App\Http\Controllers;

use App\Ayarlar;

class AdminGetController extends AdminController
{
    //

    public function get_index(){
        return view('backend.index');
    }

    public function get_ayarlar(){
        $ayarlar=Ayarlar::where('id',1)->select('ayarlar.*')->first();
        return view('backend.ayarlar')->with('ayarlar',$ayarlar);
    }

    public function get_hakkimizda(){
        return view('backend.hakkimizda');
    }
}