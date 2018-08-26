@extends("layouts.index")
@section('content')
@section('page-topic','CART')
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}">

<div style="background-color: white;">
    <div class="container">
        <div class="row" style="margin: 50px;">
            <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 20px;">
                <h1 style="font-family: 'Lobster', cursive; text-align: center; font-size: 5em;">Shopping Cart</h1>
            </div>
        </div>

        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tbody>
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Quantity</th>
                            <th class="column-5">Total</th>
                            <th class="column-6"></th>
                        </tr>
                        @foreach($items as $item)
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="{{$item->product->images}}" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2">{{$item->product->name}}</td>
                                <td class="column-3 unit-price">{{$item->product->price}}</td>

                                <td class="column-4 ml-2">
                                    <div class="flex-w bo5 of-hidden w-size17">
                                        <button class="btn-num btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                        </button>

                                        <input class="size8 m-text18 t-center num-product"
                                               id="value-{{$item->product->id}}" name="num-product1"
                                               value="{{$item->quantity}}" type="number">

                                        <button class="btn-num btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </td>
                                <td class="column-5 total-unit-price">{{$item->quantity * $item->product->price}}</td>
                                <td class="column-6 cart_delete">
                                    <a class="cart_quantity_delete" href="/cart-remove/{{$item->product->id}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>

                <!--  -->
                <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

                    <span class="m-text21 w-size20 w-full-sm">{{$cart->total_money}}</span>
                </div>

                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

                    <div class="w-size20 w-full-sm">
                        <span class="s-text19">
							Calculate Shipping
						</span>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_name" placeholder="Buyer"
                                   type="text">
                        </div>

                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_address" placeholder="Address"
                                   type="text">
                        </div>
                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_phone" placeholder="Phone"
                                   type="text">
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                    <span class="m-text21 w-size20 w-full-sm total-money">{{$cart->total_money}}</span>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-num-product-down').click(function () {
        var oldTotal = $(this).parent().parent().next().text();
        if ($(this).next().val() > 0) {
            var value = $(this).next().val();
            $(this).next().val(value -= 1);
            $(this).parent().parent().next().text($(this).next().val() * parseInt($(this).parent().parent().prev().text()));
            var currentTotal = $(this).parent().parent().next().text();
            var minus = oldTotal - currentTotal;
            var totalMoney = parseInt($('.total-money').text());
            $('.total-money').text(totalMoney - minus);
        }

    });
    $('.btn-num-product-up').click(function () {
        var oldTotal = $(this).parent().parent().next().text();
        var value = parseInt($(this).prev().val());
        $(this).prev().val(value += 1);
        $(this).parent().parent().next().text($(this).prev().val() * parseInt($(this).parent().parent().prev().text()));
        var currentTotal = $(this).parent().parent().next().text();
        var plus = currentTotal - oldTotal;
        var totalMoney = parseInt($('.total-money').text());
        $('.total-money').text(totalMoney + plus);

    });
    // $('.btn-num-product-down').next().val().change(function () {
    //     $('.total-unit-price').text($('.btn-num-product-down').next().val()* parseInt($('.unit-price').text));
    // })


</script>
@endsection
