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
        unset($request['_token']);
        $ayarlar = Ayarlar::where('id',1)->update($request->all());

        if ($ayarlar) {
            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Kayıt başarıyla yapıldı.']);
        }else{
            return response(['durum'=>'error','baslik'=>'Hatalı','icerik'=>'Kayıt yapılamadı.']);
        }
    }
}
