@extends('frontend.app')

@section('icerik')
    <div role="main" class="main">

        <section class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a></li>
                            <li class="active">Blog</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Large Image</h1>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="blog-posts">
                        @foreach($bloglar as $blog)
                            <article class="post post-large">
                                <div class="post-image">
                                    <div class="owl-carousel" data-plugin-options='{"items":1}'>

                                        @foreach($resimler=Storage::disk('uploads')->files('img/blog/'.$blog->slug) as $resim)
                                        <div>
                                            <div class="img-thumbnail">
                                                <img class="img-responsive" src="/uploads/{{$resim}}" alt="">
                                            </div>
                                        </div>

                                        @endforeach
                                    </div>
                                </div>

                                <div class="post-date">
                                    <span class="day">{{$blog->created_at->format('d')}}</span>
                                    <span class="month">{{$blog->created_at->format('M')}}</span>
                                </div>

                                <div class="post-content">

                                    <h2><a href="/blog/{{$blog->slug}}">{{$blog->baslik}}</a></h2>
                                    <p>{{$blog->kisaicerik}} [...]</p>

                                    <div class="post-meta">
                                        <span><i class="fa fa-user"></i> By <a href="#">{{$blog->yazar}}</a> </span>
                                        <span><i class="fa fa-tag"></i> {{$blog->etiketler}} </span>
                                        <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
                                        <a href="/blog/{{$blog->slug}}" class="btn btn-xs btn-primary pull-right">Devamını Oku...</a>
                                    </div>

                                </div>
                            </article>
                        @endforeach
                        <ul class="pagination pagination-lg pull-right">
                            <li><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>

                    </div>
                </div>

                @include('frontend.blog-side-bar')

            </div>

        </div>

    </div>

@endsection

@section('css')

@endsection


@section('js')

@endsection