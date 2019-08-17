<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use Illuminate\Http\Request;

class HomeGetController extends HomeController
{
    //

    public function get_index(){
        return view('frontend.index');
    }


    public function get_index_yonlendir(){
        return redirect('/');
    }

    public function get_iletisim(){

        $ayarlar=Ayarlar::where('id',1)->select('ayarlar.*')->first();
        return view('frontend.iletisim')->with('ayarlar',$ayarlar);;
    }


    public function get_hakkimizda(){
        return view('frontend.hakkimizda');
    }
}
