@extends('layouts.index')
@section('content')
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(http://www.lipsticknlinguine.com/wp-content/uploads/2018/07/Facetune_10-07-2018-21-43-07-633x391@2x.jpg);">
        <h2 class="tit6 t-center">
            List product
        </h2>
    </section>

    <!-- Main menu -->
    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
        <div class="container">
            <div class="row p-t-108 p-b-70">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">


                    <div class="blo3 flex-w flex-col-l-sm m-b-30">
                        <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                            <a href="#"><img src="images/lunch-01.jpg" alt="IMG-MENU"></a>
                        </div>

                        <div class="text-blo3 size21 flex-col-l-m">
                            <a href="#" class="txt21 m-b-3">
                                Sed varius
                            </a>

                            <span class="txt23">
								Aenean pharetra tortor dui in pellentesque
							</span>

                            <span class="txt22 m-t-20">
								$29.79
							</span>
                        </div>
                    </div>




                    <div class="wrap-item-mainmenu p-b-22">
                        <div class="tit-mainmenu tit10 p-b-25">
                            <form>
                                <label>Choose a category: </label>
                                <select name="categoryId" class="form-control m-3">
                                    <option value="0">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>


                        @foreach($list_obj as $obj)


                            <div class="blo3 flex-w flex-col-l-sm m-b-30">
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

                                    <span class="txt22 m-t-20">
                                        {{$obj->price}}
                                    </span>
                                </div>
                            </div>







                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        Pine nut sbrisalona
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        $29.79
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								    Sed fermentum eros vitae eros
							    </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
