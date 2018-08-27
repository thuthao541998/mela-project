@extends('layouts.index')
@section('content')
@section('page-topic','LIST PRODUCT')

<div class="content">
    <!-- Main menu -->
    <div class="container-fluid row bg1-pattern">
        <div class="col-lg-3 p-l-0 p-r-0 m-t-40 side-bar ">
            <section class="bg1-pattern">
                <link rel="stylesheet" type="text/css" href="{{asset('css/list_product.css')}}">
                <a href="/list-product"><h4 class="all-product">All</h4></a>
                <div class="css-treeview">
                    <h4>Categories</h4>
                    <ul class="tree-list-pad">
                        @foreach($categories as $category)
                            <li class="font-weight-bold">
                                <a href="{{url()->current().'?categoryId='.$category->id}}">
                                    <span class="{{$category->id==$choosedCategoryId?'text-danger':''}}">{{$category->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="css-treeview">
                    <h4>Brands</h4>
                    <ul class="tree-list-pad">
                        @foreach($brands as $brand)
                            <li>
                                <a href="{{url()->current().'?brandId='.$brand->id}}">
                                    <span class="{{$brand->id==$choosedBrandId?'text-danger':''}}">{{$brand->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <div class="col-lg-9 p-l-0 p-r-0 m-t-40">
            <main class="section-mainmenu p-t-30 p-b-70 bg1-pattern">
                <div class="container">
                    <div class="row p-t-10 p-b-70">
                        <div class="col-md-10 col-lg-10 p-r-35 p-r-15-lg m-l-r-auto">
                            @if(count($list_obj)>0)
                                <div class="product-title">PRODUCT LIST [{{count($list_obj)}}]</div>
                                <div class="wrap-item-mainmenu p-b-22">
                                    @foreach($list_obj as $obj)
                                        <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">
                                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">

                                                <a href=""><img src="{{$obj->images}}" alt="IMG-MENU"
                                                                 style="width: 180px; height: 180px"></a>
                                            </div>
                                            <div class="text-blo3 size21 flex-col-l-m">
                                                <a href="#" class="txt21 m-b-3">
                                                    {{$obj->name}}
                                                    @if($obj->isDiscount())
                                                        <span style="background-color: red; color:white;"
                                                              class="p-l-6 p-r-5">SALE {{$obj->discount}}%</span>
                                                    @endif
                                                    @if($obj->isNew())
                                                        <span class="font-weight-bold" style="background-color: green; color:white;">NEW</span>
                                                    @endif
                                                </a>
                                                <span class="txt23">
                                                    {{$obj->overview}}
                                                </span>
                                                <span class="txt22 m-t-10">
                                                    @if($obj->isDiscount())
                                                        <span class="font-weight-bold">{{$obj->discountPriceString}}
                                                        </span>
                                                        <del class="text-muted">
                                                            <small>{{$obj->originalPriceString}}</small>
                                                        </del>
                                                    @else
                                                        <span class="font-weight-bold">{{$obj->originalPriceString}}
                                                        </span>
                                                    @endif
                                            </span>
                                                <button class="add-cart-large add-to-cart m-t-10"  id="add-cart-{{$obj->id}}"><i
                                                            class="fas fa-cart-plus fa-2x"></i></button>
                                            </div>
                                        </div>
                                        <div class="line-item-mainmenu bg3-pattern"></div>
                                    @endforeach
                                </div>
                                <div class="pagination">
                                    {!! $list_obj->links() !!}
                                </div>
                            @else
                                <div class="no-product">
                                    <h4>Have no product in this field</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
@endsection