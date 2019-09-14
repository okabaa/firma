@extends('backend.app')


@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Blog Ekle</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo-name">Resimler
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="resimler[]" multiple required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                {{Form::bsText('baslik','Başlik','',['required'=>'required'])}}
                                {{Form::bsText('kisaicerik','Kısa Açıklama','',['required'=>'required'])}}
                                {{Form::bsText('etiketler','Etiketler','',['required'=>'required'])}}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo-name">İçerik
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea name="icerik" id="" cols="30" rows="10" required="required"
                                                      class="form-control col-md-7 col-xs-12 ckeditor"></textarea>
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
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/ckeditor/config.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();
            $('form').ajaxForm({
                beforeSubmit: function () {
                    swal.fire({
                        title: '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> <span class="sr-only">Loading...</span>',
                        text: 'Yükleniyor lütfen bekleyin...',
                        showConfirmButton: false
                    })
                },
                beforeSerialize: function () {
                    for (instance in CKEDITOR.instances) CKEDITOR.instances[instance].updateElement();
                },
                success: function (response) {
                    swal.fire(response.baslik, response.icerik, response.durum)
                }
            })
        })
    </script>
@endsection

@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet">
@endsection
