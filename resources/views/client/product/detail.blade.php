@extends("layouts.index")
@section('content')
@section('page-topic', 'Product')
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('css/product-detail.css')}}">
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
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                    <dt>Quantity: (limited 3 per customer)</dt>
                                    <dd>
                                        <select class="form-control form-control-sm" style="width:70px;">
                                            <option> 1 </option>
                                            <option> 2 </option>
                                            <option> 3 </option>
                                        </select>
                                    </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->
   </div>
</div>
@endsection
