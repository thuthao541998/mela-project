@extends('layouts.index')
@section('content')
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(http://www.lipsticknlinguine.com/wp-content/uploads/2018/07/Facetune_10-07-2018-21-43-07-633x391@2x.jpg);">
        <h2 class="tit6 t-center">
            Brand
        </h2>
    </section>

    <!-- Main menu -->
    <section class="section-mainmenu p-t-50 p-b-70 bg1-pattern">
        <div class="container">
            <div class="row p-t-10 p-b-70">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <div class="tit-mainmenu tit10 p-b-25">
                            <form>
                                <label class="p-t-10">Choose a brand: </label>
                                <select name="categoryId" class="form-control m-3">
                                    <option value="0">All</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id==$choosedBrandId?'selected':''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>

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
    </section>

@endsection
