@extends('backend.app')
@section('icerik')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>General Elements</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">


                <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">

                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#genel_ayarlar" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Genel Ayarlar</a>
                        </li>
                        <li role="presentation" class=""><a href="#iletisim_ayarlari" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">İletişim Ayarları</a>
                        </li>
                        <li role="presentation" class=""><a href="#sosyal_medya" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Sosyal Medya</a>
                        </li>
                        <li role="presentation" class=""><a href="#google_api" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Google API</a>
                        </li>
                        <li role="presentation" class=""><a href="#mail_ayarları" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Mail Ayarları</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="genel_ayarlar" aria-labelledby="home-tab">
                            {{Form::bsText('title','Site Başlığı')}}
                            {{Form::bsText('keywords','Site Anahtar Kelimeler')}}
                            {{Form::bsText('description','Site Açıklama')}}
                            {{Form::bsText('url','Site Adresi')}}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="iletisim_ayarlari" aria-labelledby="profile-tab">
                            {{Form::bsText('tel','Telefon')}}
                            {{Form::bsText('gsm','GSM')}}
                            {{Form::bsText('faks','Faks')}}
                            {{Form::bsText('adres','Adres')}}
                            {{Form::bsText('il','İl')}}
                            {{Form::bsText('ilce','İlçe')}}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="sosyal_medya" aria-labelledby="profile-tab">
                            {{Form::bsText('facebook','Facebook')}}
                            {{Form::bsText('twitter','Twitter')}}
                            {{Form::bsText('instagram','Instagram')}}
                            {{Form::bsText('youtube','Youtube')}}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="google_api" aria-labelledby="profile-tab">
                            {{Form::bsText('google','Google Hesabı')}}
                            {{Form::bsText('recapctha','Google Recapctha')}}
                            {{Form::bsText('maps','Google Maps')}}
                            {{Form::bsText('analystic','Google Analystic')}}
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="mail_ayarları" aria-labelledby="profile-tab">
                            {{Form::bsText('smtp_user','Kullanıcı Adı')}}
                            {{Form::bsPassword('smtp_password','Şifre')}}
                            {{Form::bsText('smtp_host','SMTP Host')}}
                            {{Form::bsText('smtp_port','SMTP Port')}}
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit:function () {

                },
                success:function (response) {
                        swal.fire(response.baslik, response.icerik, response.durum)
                }
            })
        })
    </script>
@endsection

@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet">

@endsection