{{-- Cần truyền vào các biến sau: --}}
{{-- $obj = product--}}
{{-- $brand = tên brand của product --}}
{{-- $category = tên category của product --}}
@extends('layouts.index')
@section('content')
@section('page-topic',$obj->name)
    <div class="container m-t-100">
        <div class="row">
            {{--<h1>{{$category}}</h1>--}}
        </div>
        <div class="row" style="display: inline-block; border: solid 1px #808080; padding: 15px">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <h2>{{$obj->name}}</h2>
                {{-- Đánh giá sản phẩm: 3/5 sao, 10 lượt đánh giá--}}
                {{--<p>--}}
                {{--<div id="rating1"></div>--}}
                {{--(10 reviews)--}}
                {{--</p>--}}
                <br />
                <p class="text-justify">{{$obj->overview}}</p>
                <p class="text-justify">{{$obj->description}}</p>
                <br>
                <h4 class="text-xs-right">Current price: <span style="color: #197BB5; font-size: 35px;">VND {{$obj->discountPrice}}</span></h4>
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
                <br />
                <button type="button" class="btn btn-danger"><i class="fa fa-shopping-cart add-to-cart" id="add-cart-{{$obj->id}}"></i> Add To Card</button>
                {{-- Có thể có chức năng thích sản phẩm sau này --}}
                <button type="button" class="btn btn-danger"><i class="fa fa-heart"></i></button>
            </div>
        </div>
    </div>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

    <script type="text/javascript">
        jQuery(function ($) {
            $('#rating1').shieldRating({
                max: 5,
                step: 1,
                value: 3,
                markPreset: false
            });
        });
    </script>

    <style>
        .btn
        {
            border-radius: 0;
        }

        .colors
        {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .color
        {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 0;
        }

        .color:first-of-type
        {
            margin-left: 20px;
        }

        .black
        {
            background: #000000;
        }

        .gray
        {
            background: #808080;
        }

        .gold
        {
            background: #D3AF37;
        }
    </style>

@endsection