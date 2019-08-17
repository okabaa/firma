@extends('frontend.app')

@section('icerik')

<div role="main" class="main">

    <section class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <h2 class="word-rotator-title">
            The New Way to <strong>
							<span class="word-rotate" data-plugin-options='{"delay": 2000}'>
								<span class="word-rotate-items">
									<span>success.</span>
									<span>advance.</span>
									<span>progress.</span>
								</span>
							</span>
            </strong>
        </h2>

        <div class="row">
            <div class="col-md-10">
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh.
                </p>
            </div>
            <div class="col-md-2">
                <a href="#" class="btn btn-lg btn-primary push-top">Join Our Team!</a>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-8">
                <h3><strong>Who</strong> We Are</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
                <p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing <span class="alternative-font">metus</span> sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula.</p>
            </div>
            <div class="col-md-4">
                <div class="featured-box featured-box-secundary">
                    <div class="box-content">
                        <h4>Behind the scenes</h4>
                        <ul class="thumbnail-gallery flickr-feed" data-plugin-flickr data-plugin-options='{"qstrings": { "id": "93691989@N03" }, "limit": 6}'></ul>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


@endsection

@section('cs')

@endsection


@section('js')

@endsection