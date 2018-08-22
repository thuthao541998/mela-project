{{-- Cần truyền vào các biến sau: --}}
{{-- $obj = product--}}
{{-- $brand = tên brand của product --}}
@extends('layouts.index')
@section('content')

    <div class="container">
        <div class="row" style="display: inline-block; border: solid 1px #808080; padding: 15px">
            <div>
                <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">
                    <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                        <img alt="IMG-MENU" style="width: 180px; height: 180px" src="{{$brand->images}}" />
                    </div>
                    <div class="text-blo3 size21 flex-col-l-m">
                        <a href="#" class="name txt21 m-b-3">
                            {{$brand->name}}
                        </a>
                        <span class="txt23">
                            {{$brand->description}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="line-item-mainmenu bg3-pattern"></div>
            <div class="product col-md-7">
                @foreach($products as $product)
                    <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20 ">
                        <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                            <a href="#"><img src="{{$product->images}}" alt="IMG-MENU" style="width: 180px; height: 180px"></a>
                        </div>

                        <div class="text-blo3 size21 flex-col-l-m">
                            <a href="#" class="txt21 m-b-3">
                                {{$product->name}}
                            </a>

                            <span class="txt23">
                                            {{$product->overview}}
                                            </span>

                            <span class="txt22 m-t-10">
                                            {{$product->price}}
                                            </span>

                            <button class="add-cart-large m-t-10"><i class="fas fa-cart-plus fa-2x"></i></button>
                        </div>
                    </div>
                    <div class="line-item-mainmenu bg3-pattern"></div>

                @endforeach
            </div>
        </div>
    </div>
@endsection