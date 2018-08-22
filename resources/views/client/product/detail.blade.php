{{-- Cần truyền vào các biến sau: --}}
{{-- $obj = product--}}
{{-- $brand = tên brand của product --}}
{{-- $category = tên category của product --}}
@extends('layouts.index')
@section('content')
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{asset('js/rating.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/product-detail.css')}}" />
    <div class="container">
        <div class="row product-main">
            <div class="col-md-7">
                <img class="img-fluid" alt="{{$obj->name}}" src="{{$obj->images}}" />
                <br />
                {{--Nếu có nhiều ảnh của sản phẩm thì nhét vào các dòng dưới--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                {{--<img class="img-fluid" alt="eCommerce Dsetail" src="http://www.prepbootstrap.com/Content/images/template/productslider/product_005.jpg" />--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                {{--<img class="img-fluid" alt="eCommerce Detail" src="http://www.prepbootstrap.com/Content/images/template/productslider/product_005.jpg" />--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                {{--<img class="img-fluid" alt="eCommerce Detail" src="http://www.prepbootstrap.com/Content/images/template/productslider/product_005.jpg" />--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-3 col-6">--}}
                {{--<img class="img-fluid" alt="eCommerce Detail" src="http://www.prepbootstrap.com/Content/images/template/productslider/product_005.jpg" />--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-5" style="padding: 20px;">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-md-5">
                        {{--<h5 class="text-xs-right">Current price: </h5>--}}
                        <h3 style="font-size: 2em;"><span style="font-size: 0.5em;">VND </span><span style="font-weight: bold; font-family: 'Quicksand', sans-serif;">{{$obj->price}}</span></h3>
                    </div>

                    <h3 class="col-md-7" style="font-weight: bold; font-family: 'Molengo', sans-serif; font-size: 2em; -ms-text-align-last: right;text-align: right;">{{$obj->name}}</h3>
                </div>

                {{-- Đánh giá sản phẩm: 3/5 sao, 10 lượt đánh giá--}}
                {{--<p>--}}
                {{--<div id="rating1"></div>--}}
                {{--(10 reviews)--}}
                {{--</p>--}}
                <br />
                <br />
                <br />
                <p class="text-justify" style="color: #999; font-style: italic;">{{$obj->overview}}</p>
                <br />
                <p class="text-justify">{{$obj->description}}</p>
                <br>
                {{-- 89% người dùng thích sản phẩm này!--}}
                {{--<p class="text-xs-right"><strong>89%</strong> of buyers enjoyed this product! <strong>(107 votes)</strong></p>--}}
                <br />
                {{--<h4>Brand:{{$brand}}--}}
                </h4>
                {{-- Có thể có tính năng chọn màu/hiển thị màu sau này--}}
                {{--<h4 class="colors">Colors:--}}
                {{--<span class="color black"></span>--}}
                {{--<span class="color gray"></span>--}}
                {{--<span class="color gold"></span>--}}
                {{--</h4>--}}
                <br />
                <button type="button" class="btn btn-dark" style="background-color: black; color: whitesmoke;">{{--<i class="fa fa-shopping-cart"></i>--}} Add To Card</button>
                {{-- Có thể có chức năng thích sản phẩm sau này --}}
                <button type="button" class="btn btn-danger"><i class="fa fa-heart"></i></button>
            </div>
        </div>
    </div>
@endsection