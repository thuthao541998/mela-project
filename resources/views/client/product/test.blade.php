@extends("layouts.index")
@section('content')
@section('page-topic','test')
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
                    <dl class="param param-feature">
                        <dt>Brand</dt>
                        <dd>{{$brand}}</dd>
                    </dl>  <!-- item-property-hor .// -->
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
    {{--<div class="container">--}}
            {{--<div class="row" style="margin: 50px;">--}}
                {{--<div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 20px;">--}}
                    {{--<h1 style="font-family: 'Lobster', cursive; text-align: center; font-size: 5em;">Shopping Cart</h1>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</hr>--}}

            {{--<div class="container">--}}
                {{--<!-- Cart item -->--}}
                {{--<div class="container-table-cart pos-relative">--}}
                    {{--<div class="wrap-table-shopping-cart bgwhite">--}}
                        {{--<table class="table-shopping-cart">--}}
                            {{--<tbody><tr class="table-head">--}}
                                {{--<th class="column-1"></th>--}}
                                {{--<th class="column-2">Product</th>--}}
                                {{--<th class="column-3">Price</th>--}}
                                {{--<th class="column-4 p-l-70">Quantity</th>--}}
                                {{--<th class="column-5">Total</th>--}}
                            {{--</tr>--}}

                            {{--<tr class="table-row">--}}
                                {{--<td class="column-1">--}}
                                    {{--<div class="cart-img-product b-rad-4 o-f-hidden">--}}
                                        {{--<img src="images/item-10.jpg" alt="IMG-PRODUCT">--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                {{--<td class="column-2">Men Tshirt</td>--}}
                                {{--<td class="column-3">$36.00</td>--}}
                                {{--<td class="column-4 ml-2">--}}
                                    {{--<div class="flex-w bo5 of-hidden w-size17">--}}
                                        {{--<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">--}}
                                            {{--<i class="fs-12 fa fa-minus" aria-hidden="true"></i>--}}
                                        {{--</button>--}}

                                        {{--<input class="size8 m-text18 t-center num-product" name="num-product1" value="1" type="number">--}}

                                        {{--<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">--}}
                                            {{--<i class="fs-12 fa fa-plus" aria-hidden="true"></i>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</td>--}}
                                {{--<td class="column-5">$36.00</td>--}}
                            {{--</tr>--}}

                            {{--</tbody></table>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">--}}
                    {{--<div class="flex-w flex-m w-full-sm">--}}
                        {{--<div class="size11 bo4 m-r-10">--}}
                            {{--<input class="sizefull s-text7 p-l-22 p-r-22" name="coupon-code" placeholder="Coupon Code" type="text">--}}
                        {{--</div>--}}

                        {{--<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">--}}
                            {{--<!-- Button -->--}}
                            {{--<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                {{--Apply coupon--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="size10 trans-0-4 m-t-10 m-b-10">--}}
                        {{--<!-- Button -->--}}
                        {{--<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                            {{--Update Cart--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Total -->--}}
                {{--<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">--}}
                    {{--<h5 class="m-text20 p-b-24">--}}
                        {{--Cart Totals--}}
                    {{--</h5>--}}

                    {{--<!--  -->--}}
                    {{--<div class="flex-w flex-sb-m p-b-12">--}}
					{{--<span class="s-text18 w-size19 w-full-sm">--}}
						{{--Subtotal:--}}
					{{--</span>--}}

                        {{--<span class="m-text21 w-size20 w-full-sm">--}}
						{{--$39.00--}}
					{{--</span>--}}
                    {{--</div>--}}

                    {{--<!--  -->--}}
                    {{--<div class="flex-w flex-sb bo10 p-t-15 p-b-20">--}}
					{{--<span class="s-text18 w-size19 w-full-sm">--}}
						{{--Shipping:--}}
					{{--</span>--}}

                        {{--<div class="w-size20 w-full-sm">--}}
                            {{--<p class="s-text8 p-b-23">--}}
                                {{--There are no shipping methods available. Please double check your address, or contact us if you need any help.--}}
                            {{--</p>--}}

                            {{--<span class="s-text19">--}}
							{{--Calculate Shipping--}}
						{{--</span>--}}

                            {{--<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">--}}
                                {{--<select class="selection-2 select2-hidden-accessible" name="country" tabindex="-1" aria-hidden="true">--}}
                                    {{--<option>Select a country...</option>--}}
                                    {{--<option>US</option>--}}
                                    {{--<option>UK</option>--}}
                                    {{--<option>Japan</option>--}}
                                {{--</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 159.883px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country-lg-container"><span class="select2-selection__rendered" id="select2-country-lg-container" title="Select a country...">Select a country...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                            {{--</div>--}}

                            {{--<div class="size13 bo4 m-b-12">--}}
                                {{--<input class="sizefull s-text7 p-l-15 p-r-15" name="state" placeholder="State /  country" type="text">--}}
                            {{--</div>--}}

                            {{--<div class="size13 bo4 m-b-22">--}}
                                {{--<input class="sizefull s-text7 p-l-15 p-r-15" name="postcode" placeholder="Postcode / Zip" type="text">--}}
                            {{--</div>--}}

                            {{--<div class="size14 trans-0-4 m-b-10">--}}
                                {{--<!-- Button -->--}}
                                {{--<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                    {{--Update Totals--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<!--  -->--}}
                    {{--<div class="flex-w flex-sb-m p-t-26 p-b-30">--}}
					{{--<span class="m-text22 w-size19 w-full-sm">--}}
						{{--Total:--}}
					{{--</span>--}}

                        {{--<span class="m-text21 w-size20 w-full-sm">--}}
						{{--$39.00--}}
					{{--</span>--}}
                    {{--</div>--}}

                    {{--<div class="size15 trans-0-4">--}}
                        {{--<!-- Button -->--}}
                        {{--<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                            {{--Proceed to Checkout--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
<script type="text/javascript">

    $('.btn-num-product-down').click(function () {
        if($('input[name="num-product1"]').val()>0){
            var value = $('input[name="num-product1"]').val();
            $('input[name="num-product1"]').val(value-=1);
        }
    });
    $('.btn-num-product-up').click(function () {
        var value = parseInt($('input[name="num-product1"]').val());
        $('input[name="num-product1"]').val(value+=1);
    });
</script>
@endsection
