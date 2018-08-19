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
            <div class="row">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <div class="tit-mainmenu tit10 p-b-25">
                            <form>
                                <label>Choose a category: </label>
                                <select name="categoryId" class="form-control m-3">
                                    <option value="0">All</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>


                        @foreach($list_obj as $obj)

                        @endforeach
                        <!-- Item mainmenu -->
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

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Aenean eu
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $19.35
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Feugiat maximus neque pharetra
							</span>
                        </div>



                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Drinks
                        </h3>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Vivamus pretium
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

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Duis pharetra ligula
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $19.35
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Feugiat maximus neque pharetra
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    In eu dolor
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $53.34
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Feugiat maximus
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $62.45
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Main
                        </h3>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Duis sed aliquet
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $31.18
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Suspendisse
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $70.25
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Feugiat maximus neque pharetra
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Scelerisque sed
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $36.19
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Etiam cursus facilisis tortor
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Mollis nulla
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $19.50
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Convallis augue
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $29.15
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                        </div>


                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Dessert
                        </h3>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    tempus aliquet
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $9.79
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    scelerisque
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $19.35
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                        </div>

                        <!-- Item mainmenu -->
                        <div class="item-mainmenu m-b-36">
                            <div class="flex-w flex-b m-b-3">
                                <a href="#" class="name-item-mainmenu txt21">
                                    Cras maximus
                                </a>

                                <div class="line-item-mainmenu bg3-pattern"></div>

                                <div class="price-item-mainmenu txt22">
                                    $5.79
                                </div>
                            </div>

                            <span class="info-item-mainmenu txt23">
								Duis pharetra ligula at urna dignissim
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
