@extends('layouts.index')
@section('content')

    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(http://www.lipsticknlinguine.com/wp-content/uploads/2018/07/Facetune_10-07-2018-21-43-07-633x391@2x.jpg);">
        <h2 class="tit6 t-center">
            List product
        </h2>
    </section>

    <!-- Main menu -->

    <div class="container-fluid row bg1-pattern">
        <div class="col-lg-3 p-l-0 p-r-0 m-t-40">
            <section class="bg1-pattern">
                <link rel="stylesheet" type="text/css" href="{{asset('css/list_product.css')}}">
                <div class="css-treeview">
                    <h4>Categories</h4>
                    <ul class="tree-list-pad">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{url()->current().'?categoryId='.$category->id}}">
                                <label><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    <span class="{{$category->id==$choosedCategoryId?'text-danger':''}}">{{$category->name}}</span></label>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="css-treeview">
                    <h4>Categories</h4>
                    <ul class="tree-list-pad">
                        @foreach($brands as $brand)
                            <li>
                                <a href="{{url()->current().'?brandId='.$brand->id}}">
                                    <label><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        <span class="{{$brand->id==$choosedBrandId?'text-danger':''}}">{{$brand->name}}</span></label>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <div class="col-lg-9 p-l-0 p-r-0 m-t-40">
            {{--<section class="bg1-pattern">--}}
                {{--<div class="container p-t-20 p-b-20">--}}
                    {{--<div class="tit-mainmenu tit10 p-b-25">--}}
                        {{--<form action="/list-product" method="GET" name="filter-form">--}}
                            {{--<div class="col-lg-6">--}}
                                {{--<label class="p-t-10">Choose a category: </label>--}}
                                {{--<div class="col-lg-8">--}}
                                    {{--<select name="categoryId" class="form-control m-3 w-75" id="categoryId">--}}
                                        {{--<option value="0">All</option>--}}
                                        {{--@foreach($categories as $category)--}}
                                            {{--<option value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="col-lg-6">--}}
                                {{--<label class="p-t-10">Choose a brand: </label>--}}
                                {{--<div class="col-lg-8">--}}
                                    {{--<select name="brandId" class="form-control m-3">--}}
                                        {{--<option value="0">All</option>--}}
                                        {{--@foreach($brands as $brand)--}}
                                            {{--<option value="{{$brand->id}}" {{$brand->id==$choosedBrandId?'selected':''}}>{{$brand->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}


            <main class="section-mainmenu p-t-30 p-b-70 bg1-pattern">
                <div class="container">
                    <div class="row p-t-10 p-b-70">
                        <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">

                            <div class="wrap-item-mainmenu p-b-22">

                                @foreach($list_obj as $obj)

                                    <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">
                                        <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                            <a href="#"><img src="{{$obj->images}}" alt="IMG-MENU"></a>
                                        </div>

                                        <div class="text-blo3 size21 flex-col-l-m">
                                            <a href="#" class="txt21 m-b-3">
                                                {{$obj->name}}
                                            </a>

                                            <span class="txt23">
                                            {{$obj->overview}}
                                            </span>

                                            <span class="txt22 m-t-10">
                                            {{$obj->price}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>








    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $('a.hello').change(function () {
            window.location.href = $('form[name="filter-form"]').attr('action') + '?categoryId=' + $(this).val();
        });
        $('form[name="filter-form"] select[name="categoryId"]').change(function () {
            window.location.href = $('form[name="filter-form"]').attr('action') + '?categoryId=' + $(this).val();
        });
        $('form[name="filter-form"] select[name="bradnId"]').change(function () {
            window.location.href = $('form[name="filter-form"]').attr('action') + '?brandId=' + $(this).val();
        });
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

@endsection
