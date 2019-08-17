<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Hakkimizda;

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
        $hakkimizda = Hakkimizda::where('id',1)->select('hakkimizda.*')->first();
        return view('backend.hakkimizda')->with('hakkimizda',$hakkimizda);
    }
}