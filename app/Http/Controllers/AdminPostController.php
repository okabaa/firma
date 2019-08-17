<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Hakkimizda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class AdminPostController extends AdminController
{
    //

    public function post_ayarlar(Request $request){
        if(isset($request->logo)){
            $validator = Validator::make($request->all(),
                [
                    'logo' => 'mimes:jpg,jpeg,png,gif',
                ]);
            if ($validator->fails()){
                return response(['durum'=>'error','baslik'=>'Hatalı','icerik'=>'Yüklediğiniz dosyanın uzantısı jpg,jpeg,png veya gif uzantılarından birisi olmalıdır.']);
            }

            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_isim = 'logo.'.$logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(222,108)->save('uploads/img/'.$logo_isim);
        }

        try {
            unset($request['_token']);
            if(isset($request->logo)){
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo'=>$logo_isim]);

            } else {
                $eski_logo = $request->eski_logo;
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo'=>$eski_logo]);
            }

            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e){
            return response(['durum'=>'error','baslik'=>'Hatalı','icerik'=>'Kayıt yapılamadı.']);
        }
    }

    public function post_hakkimizda(Request $request){

        try {
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e){
            return response(['durum'=>'error','baslik'=>'Hatalı','icerik'=>'Kayıt yapılamadı.']);
        }
    }
}