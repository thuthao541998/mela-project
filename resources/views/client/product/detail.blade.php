@extends("layouts.index")
@section('content')
@section('page-topic', 'Product')
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('css/product-detail.css')}}">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/product-related-item.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/product-related-item.css')}}">


<div style="background-color: white;">

    <div class="container" style="padding: 50px;">
        <div class="card">
            <div class="row">
                <aside class="col-sm-6 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div> <a href="#"><img src="{{$obj->images}}" alt="{{$obj->name}}"></a></div>
                        </div> <!-- slider-product.// -->
                        {{--<div class="img-small-wrap">--}}
                        {{--<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
                        {{--<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
                        {{--<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
                        {{--<div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
                        {{--</div> <!-- slider-nav.// -->--}}
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-6">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{$obj->name}}</h3>

                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="currency">VND </span><span class="num">{{$obj->price}}</span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->
                        <br>
                        <dl class="item-property">
                            <dt>Overview</dt>
                            <dd><p>{{$obj->overview}}</p></dd>
                        </dl>
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{$obj->description}}</p></dd>
                        </dl>
                        {{--<dl class="param param-feature">--}}
                            {{--<dt>Brand</dt>--}}
                            {{--<dd>{{$brand}}</dd>--}}
                        {{--</dl>  <!-- item-property-hor .// -->--}}
                        <hr>

                        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->
   </div>

    {{--Related Products--}}
    <div class="container">
        <div class="row blog">

            <div class="text-center" style="padding-left: 500px;">
                <h3 class="tit2 text-center">
                    Related Products
                </h3>
            </div>

        </div>
        <div class="row blog">
            <div class="col-md-12">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel" style="margin: 30px;">
                    <div style="display: none" id="hidden-list">
                        @foreach($list_obj as $item)
                            <div class="col-md-3">
                                <a href="/product/{{$item->id}}">
                                    <img src="{{$item->images}}" alt="Image" style="max-width:100%;">
                                    <div>{{$item->name}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                                @for ($i = 0; $i < 4; $i++)

                                    <div class="col-sm-3">
                                        <div class="imagebox">
                                            <a href="/product/{{$list_obj[$i]->id}}">
                                                <img src="{{$list_obj[$i]->images}}" alt="{{$list_obj[$i]->name}}" style="max-width:100%;">
                                                <span class="imagebox-desc">{{$list_obj[$i]->name}}</span>
                                            </a>
                                        </div>
                                    </div>

                                    {{--<div class="col-md-3">--}}
                                        {{--<a href="/product/{{$list_obj[$i]->id}}">--}}
                                            {{--<img src="{{$list_obj[$i]->images}}" alt="Image" style="max-width:100%;">--}}
                                            {{--<div>{{$list_obj[$i]->name}}</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                @endfor
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                        <div class="carousel-item">
                            <div class="row">
                                @for ($i = 4; $i < 8; $i++)
                                    <div class="col-sm-3">
                                        <div class="imagebox">
                                            <a href="/product/{{$list_obj[$i]->id}}">
                                                <img src="{{$list_obj[$i]->images}}" alt="{{$list_obj[$i]->name}}" style="max-width:100%;">
                                                <span class="imagebox-desc">{{$list_obj[$i]->name}}</span>
                                            </a>
                                        </div>
                                    </div>

                                    {{--<div class="col-md-3">--}}
                                        {{--<a href="/product/{{$list_obj[$i]->id}}">--}}
                                            {{--<img src="{{$list_obj[$i]->images}}" alt="{{$list_obj[$i]->name}}" style="max-width:100%;">--}}
                                            {{--<div>{{$list_obj[$i]->name}}</div>--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                @endfor
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                    </div>
                    <!--.carousel-inner-->



                </div>
                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--.Carousel-->

            </div>
        </div>
    </div>

</div>
@endsection
