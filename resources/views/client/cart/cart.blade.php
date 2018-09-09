@extends("layouts.index")
@section('content')
@section('page-topic','CART')
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}">

<div class="cart">
    <div class="container">
        <div class="row" style="margin: 50px;">
            <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 20px;">
                <h1 style="font-family: 'Lobster', cursive; text-align: center; font-size: 5em;">Shopping Cart</h1>
            </div>
        </div>
        @if(count($items)>0)
            <div class="container">
                <form action="/sua-gio-hang" method="post" name="update-cart-form">
                {{csrf_field()}}
                @method('PUT')
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
                                @if(isset($items))
                                @foreach($items as $item)
                                    <tr class="table-row-{{$item->product->id}}">
                                        <td class="column-1">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="{{$item->product->images}}" alt="IMG-PRODUCT">
                                            </div>
                                        </td>
                                        <td class="column-2">{{$item->product->name}}</td>
                                        @if($item->product->isDiscount())
                                            <td class="column-3 unit-price">
                                                <div>{{$item->product->discountPriceWithFormat}}</div>
                                                <span class="text-danger">-{{$item->product->discount}}%</span>
                                                <del class="text-danger small">{{$item->product->originalPriceWithFormat}}</del>
                                            </td>
                                        @else
                                            <td class="column-2">{{$item->product->originalPriceWithFormat}}</td>
                                        @endif
                                        <td class="column-4 ml-2">
                                            <div class="flex-w bo5 of-hidden w-size17 quantity"
                                                 style="margin-left: 40px;">
                                                <button type="button"
                                                        class="btn-num btn-num-product-down color1 flex-c-m size7 bg8 eff2">

                                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                                <input class="size8 m-text18 t-center num-product"
                                                       name="products[{{$item->product->id}}]"
                                                       value="{{$item->quantity}}" type="number">
                                                <button type="button"
                                                        class="btn-num btn-num-product-up color1 flex-c-m size7 bg8 eff2">

                                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="column-5 total-unit-price"
                                            id="unit-total-{{$item->product->id}}">{{$item->getTotalPriceWithFormat()}}</td>
                                        <td class="column-6 cart_delete" id="row-{{$item->product->id}}">
                                            <a class="cart_quantity_delete" id="delete-{{$item->product->id}}" href="#"><i
                                                        class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="flex-w flex-sb-m p-t-25 p-b-25 p-l-35 p-r-60 p-lr-15-sm">
                             <div class="size10 trans-0-4 m-t-10 m-b-10">
                             <!-- Button -->
                                <input name="save-changes" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"
                                    value="Save changes"
                                    type="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <form action="/check-out" name="order-form" method="POST" >
                @csrf();
                <!-- Total -->
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm m-b-50" style="background: white">
                    <h5 class="m-text20 p-b-24">
                        Cart Totals
                    </h5>
                    <!--  -->
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <span class="s-text18 w-size19 w-full-sm">
                          Shipping:
                        </span>

                        <form class="w-size20 w-full-sm" method="POST" action="/check-out">
                            <div class="size15 bo4 m-b-30 m-t-20">
                                <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_name" placeholder="Receiver Name"
                                       type="text">
                            </div>

                            <div class="size15 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_address" placeholder="Address"
                                       type="text">
                            </div>
                            <div class="size15 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" name="ship_phone" placeholder="Phone"
                                       type="text">
                            </div>
                        </form>
                    </div>

                    <!--  -->
                    <div class="p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>
                        <span class="m-text21 w-size20 w-full-sm total-money p-l-30">{{$cart->getTotalMoneyWithFormat()}}</span>
                        <span>(VND)</span>
                    </div>

                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 checkout-btn"
                                type="submit">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </form>
    </div>
    @else
        <div class="container-table-cart pos-relative"
             style="border: solid #7f7f7f 1px; padding-bottom: 50px ; padding-left: 50px; padding-top: 50px ; margin-bottom: 50px">
            You haven't chosen any product! Click <a href="/list-product" style="font-weight: bold">here</a> to
            choose one and comeback
        </div>
    @endif
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="{{asset('js/jquery.formatNumber-0.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/showcart.js')}}">

</script>
@endsection
