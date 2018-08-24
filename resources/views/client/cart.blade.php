@extends('layout.client-layout-v2')
@section('content')
    <section class="bg1-pattern">
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('images/heading-pages-01.jpg');">
            <h2 class="l-text2 t-center">
                Cart
            </h2>
        </section>

        <section class="cart bgwhite p-t-70 p-b-100">
            <div class="container">
                <form action="/edit-cart" method="post" name="update-cart-form">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="container-table-cart pos-relative">
                        <div class="wrap-table-shopping-cart bgwhite">
                            <table class="table-shopping-cart">
                                <tr class="table-head">
                                    <th class="column-1"></th>
                                    <th class="column-2">Name</th>
                                    <th class="column-3">Price (VND)</th>
                                    <th class="column-4 p-l-70">Quantity</th>
                                    <th class="column-5">Total (VND)</th>
                                </tr>
                                @foreach($cart->items as $item)
                                    <tr class="table-row">
                                        <td class="column-1">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img src="{{$item->product->images}}" alt="{{$item->product->name}}">
                                            </div>
                                        </td>
                                        <td class="column-2">{{$item->product->name}}</td>
                                        <td class="column-3">{{$item->product->price}}</td>
                                        <td class="column-4">
                                            <div class="flex-w bo5 of-hidden w-size17">
                                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                                <input class="size8 m-text18 t-center num-product"
                                                       type="number" name="products[{{$item->product->id}}]" value="{{$item->quantity}}">

                                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="column-5">{{$item->getTotalPriceWithFormat()}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                        <div class="flex-w flex-m w-full-sm">
                            <a href="/list-product">
                                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                                    <button class="flex-c-m sizefull bg0 bo-rad-23 hov1 s-text1 trans-0-4" type="button">
                                        Continue buying
                                    </button>
                                </div>
                            </a>
                        </div>

                        <div class="size10 trans-0-4 m-t-10 m-b-10">
                            <input class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="Save changes" type="submit">
                        </div>
                    </div>
                </form>

                <form action="/check-out-order" name="order-form" method="POST">
                    @csrf();
                    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                        <h5 class="m-text20 p-b-24">
                            Order detail
                        </h5>

                        <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Total:
					</span>

                            <span class="m-text21 w-size20 w-full-sm">
						{{$cart -> getTotalMoneyWithFormat()}} (VND)
					</span>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Receiver information:
					</span>

                            <div class="w-size20 w-full-sm">
                                <div>
                            <span class="s-text19">
							    Full name
						    </span>
                                    <div class="size13 bo4 m-b-12">
                                        <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship_name" placeholder="">
                                    </div>
                                </div>
                                <div>
                            <span class="s-text19">
                                Address
                            </span>
                                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="ship_address" placeholder=""></textarea>
                                </div>
                                <div>
                            <span class="s-text19">
                                Phone number
                            </span>
                                    <div class="size13 bo4 m-b-12">
                                        <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship_phone" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                            <span class="m-text21 w-size20 w-full-sm">
						{{$cart -> getTotalMoneyWithFormat()}} (VND)
					</span>
                        </div>

                        <div class="size15 trans-0-4">
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Check out order
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection