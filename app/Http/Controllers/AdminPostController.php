<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use App\Blog;
use App\Hakkimizda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AdminPostController extends AdminController
{
    //

    public function post_ayarlar(Request $request)
    {
        if (isset($request->logo)) {
            $validator = Validator::make($request->all(),
                [
                    'logo' => 'mimes:jpg,jpeg,png,gif',
                ]);
            if ($validator->fails()) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Yüklediğiniz dosyanın uzantısı jpg,jpeg,png veya gif uzantılarından birisi olmalıdır.']);
            }

            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_isim = 'logo.' . $logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(222, 108)->save('uploads/img/' . $logo_isim);
        }

        try {
            unset($request['_token']);
            if (isset($request->logo)) {
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $logo_isim]);

            } else {
                $eski_logo = $request->eski_logo;
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $eski_logo]);
            }

            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.<br>' . $e->getMessage()]);
        }
    }

    public function post_hakkimizda(Request $request)
    {

        try {
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.<br>' . $e->getMessage()]);
        }
    }

    public function post_blog_ekle(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'resimler[]' => 'mimes:jpg,jpeg,png,gif',
                'baslik' => 'required|max:250',
                'kisaicerik' => 'required|max:500',
                'etiketler' => 'required|max:250',
                'icerik' => 'required'

            ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hata!', 'icerik' => 'Zorunlu alanlar doldurulmalıdır.']);
        }

        $tarih = str_slug(Carbon::now());
        $slug = str_slug($request->baslik) . '-' . $tarih;
        $resimler = $request->file('resimler');

        if (!empty($resimler)) {
            $i = 0;
            foreach ($resimler as $resim) {
                $i++;
                $resim_uzanti = $resim->getClientOriginalExtension();
                $resim_isim = $i . '_' . $tarih . '.' . $resim_uzanti;
                Storage::disk('uploads')->makeDirectory('img/blog/' . $slug);
                Storage::disk('uploads')->put('img/blog/' . $slug . '/' . $resim_isim, file_get_contents($resim));
            }
        }
        try {
            unset($request['_token']);
            $tarih = str_slug(Carbon::now());
            $slug = str_slug($request->baslik) . '-' . $tarih;
            $request->merge(['slug' => $slug]);
            Blog::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Kayıt yapılamadı.<br>' . $e->getMessage()]);
        }
    }

    public function post_blog(Request $request)
    {
        try {
            Blog::where('slug', $request->slug)->delete();
            Storage::disk('uploads')->deleteDirectory('img/blog/' . $request->slug);
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Silindi.']);
        } catch (\Exception $e) {
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Silinmedi!<br>' . $e->getMessage()]);
        }
    }

    public function post_blog_duzenle(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'baslik' => 'required|max:250',
                'kisaicerik' => 'required|max:500',
                'etiketler' => 'required|max:250',
                'icerik' => 'required'

            ]);
        if ($validator->fails()) {
            return response(['durum' => 'error', 'baslik' => 'Hata!', 'icerik' => 'Zorunlu alanlar doldurulmalıdır.']);
        }

        if (isset($request->resim)) {
            try {
                Storage::disk('uploads')->delete($request->resim);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Silindi.']);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Silinmedi!<br>' . $e->getMessage()]);
            }
        } else {
            $tarih = str_slug(Carbon::now());
            $resimler = $request->file('resimler');

            if (!empty($resimler)) {
                $i = $request->sayi;
                foreach ($resimler as $resim) {
                    $i++;
                    $resim_uzanti = $resim->getClientOriginalExtension();
                    $resim_isim = $i . '_' . $tarih . '.' . $resim_uzanti;
                    Storage::disk('uploads')->makeDirectory('img/blog/' . $request->slug);
                    Storage::disk('uploads')->put('img/blog/' . $request->slug . '/' . $resim_isim, file_get_contents($resim));
                }
            }
            try {
                Blog::where('slug', $request->slug)->update(['baslik' => $request->baslik, 'etiketler' => $request->etiketler, 'icerik' => $request->icerik,'kisaicerik'=>$request->kisaicerik]);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Güncellendi.']);
            } catch (\Exception $e) {
                return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Güncellenmedi!<br>' . $e->getMessage()]);
            }
        }
    }
}