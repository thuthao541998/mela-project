<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-topic')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
{{--<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">--}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/themify/themify-icons.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/lightbox.min.css')}}">
    <!--===============================================================================================-->
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/brand-detail.css')}}">
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body class="animsition">
    \
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo p-l-60">
                    <a href="/">
                        <img src="{{asset('images/logo.png')}}" alt="IMG-LOGO" data-logofixed="{{asset('images/logo.png')}}">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-100 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu m-l-94">
                            <li>
                                <a href="/">Home</a>
                            </li>

                            <li>
                                <a href="/list-product">Product</a>
                            </li>

                            <li>
                                <a href="/list-article">Article</a>
                            </li>

                            <li>
                                <a href="/contact-us">Contact</a>
                            </li>

                            <li>
                                <a href="/about-us">About</a>

                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-70">
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                    <span class="p-l-30">
                        <div class="btn-show-menu">
                            <div class="wrap_header_mobile" style="background-color: transparent; color: #fff;">
                                <!-- Button show menu -->
                                <div class="btn-show-menu">
                                    <!-- Header Icon mobile -->
                                    <div class="header-icons-mobile">
                                        <div class="header-wrapicon2">
                                            <button href="#" class="fa fa-shopping-cart fa-2x js-show-header-dropdown m-t-10"></button>
                                            <span class="header-icons-noti" style="left: 35px; bottom: 20px; top: 0px;" id="header-icons-noti">
                                                {{\App\Cart::getTotalItem()}}
                                            </span>

                                            <!-- Header cart noti -->
                                            <div class="header-cart header-dropdown">
                                                <ul class="header-cart-wrapitem">
                                                    @if(\App\Cart::getTotalItem()>0)
                                                        @foreach(\App\Cart::getCart()->items as $item)
                                                            <li class="header-cart-item">
                                                                <div class="header-cart-item-img">
                                                                    <img src="{{$item->product->images}}" alt="IMG">
                                                                </div>

                                                                <div class="header-cart-item-txt">
                                                                    <a href="#" class="header-cart-item-name" style="color: #555; ">
                                                                        {{$item->product->name}}
                                                                    </a>
                                                                    <span class="header-cart-item-info">
                                                                        {{$item->quantity}} x {{$item->product->discountPriceWithFormat}}
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li style="color:black;">'You haven't chosen any product yet'</li>
                                                    @endif
                                                </ul>

                                                <div class="header-cart-total">
                                                    Total: <span id="header-cart-total">{{\App\Cart::getCart()->getTotalMoneyWithFormat()}}</span>
                                                </div>

                                                <div class="header-cart-buttons">
                                                    <div class="header-cart-wrapbtn">
                                                        <!-- Button -->
                                                        <a href="/cart" class="flex-c-m bg1 bo-rad-20 hov1 s-text1 trans-0-4 view-cart" style="color:white">
                                                            View Cart
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                    @if(isset(Auth::user()->name))
                        <div class="dropdown" style="background-color: #bd3112;
                                                        color: white;
                                                        border-radius: 10px;
                                                        margin-left: 30px;">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Hi {{Auth::user()->name}} <i class="fas fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="m-l-20"><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  style="color:black" class="dropdown-item" href="{{ url('/logout') }}" ><i class="fas fa-key"></i>  Log Out</a></div>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @else
                    <span class="m-r-80 m-l-30 btn-show-menu">
                        <a href="{{route('client.login')}}"><i class="fas fa-user-circle fa-2x" aria-hidden="true" ></i></a>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sidebar -->
<aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <ul class="menu-sidebar p-t-95 p-b-70">
        <li class="t-center m-b-13">
            <a href="https://www.facebook.com/MelaHanoi/"><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i></a>
            &nbsp;
            <a href="#"><i class="fab fa-snapchat-square fa-2x" aria-hidden="true"></i></a>
            &nbsp;
            <a href="#"><i class="fab fa-line fa-2x" aria-hidden="true"></i></a>
        </li>


        <li class="t-center m-b-13">
            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
        </li>

        <li class="t-center m-b-13">
            <a href="/" class="txt19">Home</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/list-product">PRODUCT</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/about-us" class="txt19">About</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/list-article" class="txt19">Article</a>
        </li>

        <li class="t-center m-b-33">
            <a href="/contact-us" class="txt19">Contact</a>
        </li>

        <li class="t-center">
            <!-- Button3 -->
            <a href="/cart" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
                Cart
            </a>
        </li>
    </ul>

    <!-- - -->
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <!-- - -->
        <h4 class="txt20 m-b-33">
            Gallery
        </h4>

        <!-- Gallery -->
        <div class="wrap-gallery-sidebar flex-w">
            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-01.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-01.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-02.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-02.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-03.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-03.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-05.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-05.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-06.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-06.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('')}}images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-07.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-09.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-09.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-10.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-10.jpg')}}" alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href="{{asset('images/photo-gallery-11.jpg')}}" data-lightbox="gallery-footer">
                <img src="{{asset('images/photo-gallery-11.jpg')}}" alt="GALLERY">
            </a>
        </div>
    </div>
</aside>

<!-- Slide1 -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1 item1-slick1 bg-1" style="background-image:url({{asset('images/master-slides-01.jpg')}});">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Welcome to
                        </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                        MELA Cosmetics
                    </h2>
                    <h3 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">SALE UP TO 40%</h3>
                    <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                        <!-- Button1 -->
                        <a href="/" class="btn1 flex-c-m size1 txt3 trans-0-4" style="width:200px">
                            MELA Cosmetics
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item2-slick1 bg-2" style="background-image: url({{asset('images/master-slides-02.jpg')}});">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
                            Welcome to
                        </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                        MELA Cosmetics
                    </h2>
                    <h3 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">SALE UP TO 40%</h3>
                    <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                        <!-- Button1 -->
                        <a href="/" class="btn1 flex-c-m size1 txt3 trans-0-4" style="width:200px">
                            MELA Cosmetics
                        </a>
                    </div>
                </div>
            </div>

            <div class="item-slick1 item3-slick1 bg-3" style="background-image: url({{asset('images/slide1-02.jpg')}});">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Welcome to
                        </span>

                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                        MELA Cosmetics
                    </h2>
                    <h3 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">SALE UP TO 40%</h3>
                    <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                        <!-- Button1 -->
                        <a href="/" class="btn1 flex-c-m size1 txt3 trans-0-4" style="width:200px">
                            MELA Cosmetics
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="wrap-slick1-dots"></div>
    </div>
</section>
    @yield('content')



<!-- Blog -->
<section class="section-blog bg-white p-t-115 p-b-123">
        <div class="container">
            <div class="title-section-ourmenu t-center m-b-22">
                <span class="tit2 t-center">
                    Latest News
                </span>

                <h3 class="tit5 t-center m-t-2">
                    The Blog
                </h3>
            </div>

            <div class="row">
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                            <a href="blog-detail.html"><img src="{{asset('images/blog-01.jpg')}}" alt="IMG-INTRO"></a>

                            <div class="time-blog">
                                21 Dec 2017
                            </div>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="blog-detail.html"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    Not only is beauty
                                </h4></a>

                            <p class="m-b-20">
                                Mela Cosmetics with lipstick is not just a normal lipstick beauty, but also ...
                            </p>

                            <a href="blog-detail.html" class="txt4">
                                Continue Reading
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                            <a href="blog-detail.html"><img src="{{asset('images/blog-02.jpg')}}" alt="IMG-INTRO"></a>

                            <div class="time-blog">
                                15 Dec 2017
                            </div>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="blog-detail.html"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    Darkness
                                </h4></a>

                            <p class="m-b-20">
                                Mela lipstick always makes you stand out Shop though not enough light, by ...
                            </p>

                            <a href="blog-detail.html" class="txt4">
                                Continue Reading
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                            <a href="blog-detail.html"><img src="{{asset('images/blog-03.jpg')}}" alt="IMG-INTRO"></a>

                            <div class="time-blog">
                                12 Dec 2017
                            </div>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="blog-detail.html"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    Daily life
                                </h4></a>

                            <p class="m-b-20">
                                Mela Cosmetics with the concept new lipstick model nice, but just ...
                            </p>

                            <a href="blog-detail.html" class="txt4">
                                Continue Reading
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



<!-- Sign up -->
<div class="section-signup bg1-pattern p-t-85 p-b-85">
    <form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
            <span class="txt5 m-10">
                Specials Sign up
            </span>

        <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address" placeholder="Email Adrress">
            <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
        </div>

        <!-- Button3 -->
        <button type="submit" class="btn3 flex-c-m size2 txt11 trans-0-4 m-10">
            Sign-up
        </button>
    </form>
</div>


<!-- Footer -->
<footer class="bg1">
    <div class="container p-t-40 p-b-70">
        <div class="row">
            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Contact Us
                </h4>

                <ul class="m-b-70">
                    <li class="txt14 m-b-14">
                        <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        8th floor, 379 Hudson St, New York, NY 10018
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        (+1) 96 716 6879
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                        mela.cosmetics.2018@gmail.com
                    </li>
                </ul>

                <!-- - -->
                <h4 class="txt13 m-b-32">
                    Opening Times
                </h4>

                <ul>
                    <li class="txt14">
                        09:30 AM – 11:00 PM
                    </li>

                    <li class="txt14">
                        Every Day
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Latest twitter
                </h4>

                <div class="m-b-25">
                        <span class="fs-13 color2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </span>
                    <a href="#" class="txt15">
                        @colorlib
                    </a>

                    <p class="txt14 m-b-18">
                        Activello is a good option. It has a slider built into that displays the featured image in the slider.
                        <a href="#" class="txt15">
                            https://buff.ly/2zaSfAQ
                        </a>
                    </p>

                    <span class="txt16">
                            21 Dec 2017
                        </span>
                </div>

                <div>
                        <span class="fs-13 color2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </span>
                    <a href="#" class="txt15">
                        @colorlib
                    </a>

                    <p class="txt14 m-b-18">
                        Activello is a good option. It has a slider built into that displays
                        <a href="#" class="txt15">
                            https://buff.ly/2zaSfAQ
                        </a>
                    </p>

                    <span class="txt16">
                            21 Dec 2017
                        </span>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-38">
                    Gallery
                </h4>

                <!-- Gallery footer -->
                <div class="wrap-gallery-footer flex-w">
                    <a href="/list-product?categoryId=1" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-01.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=2" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-02.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=3" class="item-gallery-footer wrap-pic-w"data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-03.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=4" class="item-gallery-footer wrap-pic-w"data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-04.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=5" class="item-gallery-footer wrap-pic-w"data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-05.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=6" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-06.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=7" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-07.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=8" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-08.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=9" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-09.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=10" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-10.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=11" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-11.jpg')}}" alt="GALLERY">
                    </a>

                    <a href="/list-product?categoryId=12" class="item-gallery-footer wrap-pic-w" data-lightbox="gallery-footer">
                        <img src="{{asset('images/photo-gallery-thumb-12.jpg')}}" alt="GALLERY">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="end-footer bg2">
        <div class="container">
            <div class="flex-sb-m flex-w p-t-22 p-b-22">
                <div class="p-t-5 p-b-5">
                    <a href="https://www.facebook.com/MelaHanoi/"><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i></a>
                </div>

                <div class="txt17 p-r-20 p-t-5 p-b-5">
                    Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fas fa-angle-double-up fa-2x" aria-hidden="true"></i>
        </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
{{--<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>--}}
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/parallax100.js')}}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
    // $('a.view-cart').click(function(e)
    // {
    //     e.preventDefault();
    // });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>


</body>
</html>
