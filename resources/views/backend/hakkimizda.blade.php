@extends('backend.app')
@section('icerik')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hakkımızda</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Hakkımızda</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="" method="post" id="form" data-parsley-validate class="form-horizontal form-label-left">
                                {{Form::bsText('facebook','Facebook')}}
                                {{Form::bsText('twitter','Twitter')}}
                                {{Form::bsText('instagram','Instagram')}}
                                {{Form::bsText('youtube','Youtube')}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection

@section('css')

@endsection