@extends("layouts.index")
@section('content')
@section('page-topic','MELA Cosmetics')
<!-- Welcome -->
<section class="section-welcome bg1-pattern p-t-120 p-b-105">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-t-45 p-b-30">
                <div class="wrap-text-welcome t-center">
                        <span class="tit2 t-center">
                            Mela Cosmetics
                        </span>

                    <h3 class="tit3 t-center m-b-35 m-t-5">
                        Welcome
                    </h3>

                    <p class="t-center m-b-22 m-l-r-auto">
                        Welcome to Mela Cosmetics, let shop tell you what is the power of Lipstick. Let us enlighten you
                        on "Saint Lipstick"
                    </p>
                    <a style="padding: 10px;" class="btn btn-danger bo-rad-5" href="/list-product">Click here to get
                        your boyfriend a perfect KISS</a>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <div class="wrap-pic-welcome bo-rad-10 hov-img-zoom m-l-r-auto">
                    <img src="images/our-story-01.jpg" alt="IMG-OUR">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Intro -->
<section class="section-intro">
    <div class="header-intro parallax100 t-center p-t-135 p-b-158"
         style="background-image: url({{asset('images/bg-intro-01.jpg')}});">
            <span class="tit2 p-l-15 p-r-15">
                Discover
            </span>

        <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
            Mela Place
        </h3>
    </div>

    <div class="content-intro bg-white p-t-77 p-b-133">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                            <a href="/article/3"><img src="images/intro-01.jpg" alt="IMG-INTRO"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="/article/3"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    A Women's March Organizer on the Feminist Power of Red Lipstick
                                </h4></a>

                            <p class="m-b-20">
                                Have you ever thought: "Lipstick is just cosmetics applied to the lips alone?" So,
                                you're wrong, let Mela enlighten you from thoughts
                            </p>

                            <a href="/article/3" class="txt4">
                                Learn more
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                            <a href="/article/4"><img src="images/intro-02.jpg" alt="IMG-INTRO"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="/article/4"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    LIPSTICK REVIEW FOR VALENTINE’S DAY
                                </h4></a>

                            <p class="m-b-20">
                                The lipsticks by Soft Touch also fade in a nice way. A great option for shiny + durable
                                lipstick lovers, who are willing to compromise a little on durability for a lower
                                price. </p>

                            <a href="/article/4" class="txt4">
                                Learn more
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                            <a href="/article/5"><img src="images/intro-04.jpg" alt="IMG-INTRO"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="/article/5"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    NARSISSIST WANTED VELVET LIPGLIDE SET
                                </h4></a>

                            <p class="m-b-20">
                                "Only expensive lipstick is good!" if think so, you're wrong. Let Mela enlighten you
                                about public perception.
                            </p>

                            <a href="/article/5" class="txt4">
                                Learn more
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Our menu -->
<section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
    <div class="container">
        <div class="title-section-ourmenu t-center m-b-22">
                <span class="tit2 t-center">
                    Discover
                </span>

            <h3 class="tit5 t-center m-t-2">
                Our Categories
            </h3>
        </div>

        <div class="row">
            @foreach($list_obj as $item)
                <div class="col-md-4">
                    <!-- Item our menu -->
                    <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                        <img src="{{$item->images}}" class="cate-img" alt="IMG-MENU">

                        <!-- Button2 -->
                        <a href="/list-product?categoryId={{$item->id}}" class="btn2 flex-c-m txt5 ab-c-m size7">
                            {{$item->name}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Event -->
<section class="section-event">
    <div class="wrap-slick2">
        <div class="slick2">
            <div class="item-slick2 item1-slick2"
                 style="background-image: url({{asset('images/bg-event-01.jpg')}});">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                                <span class="tit2 p-l-15 p-r-15">
                                    Upcomming
                                </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Events
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"
                             data-appear="zoomIn">
                            <!-- Pic block2 -->
                            <a href="https://www.facebook.com/events/1874650265965421/" class="wrap-pic-blo2 bg1-blo2"
                               style="background-image: url({{asset('images/event-02.jpg')}});">
                                <div class="time-event size10 txt6 effect1">
                                        <span class="txt-effect1 flex-c-m t-center">
                                            08:00 PM Friday - 21 September 2018
                                        </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    Lipstick and baby
                                </h4>

                                <p class="t-center">
                                    Let your baby love to enjoy your home without fear of toxic chemicals to the baby
                                </p>

                                <div class="flex-sa-m flex-w w-full m-t-40">
                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 days">
                                                6
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Days
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 hours">
                                                0
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Hours
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 minutes">
                                                59
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Minutes
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 seconds">
                                                56
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Seconds
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick2 item2-slick2"
                 style="background-image: url({{asset('images/bg-event-02.jpg')}});">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                                <span class="tit2 p-l-15 p-r-15">
                                    Upcomming
                                </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Events
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"
                             data-appear="fadeInDown">
                            <!-- Pic block2 -->
                            <a href="https://www.facebook.com/events/293327291479946/" class="wrap-pic-blo2 bg2-blo2"
                               style="background-image: url({{asset('images/event-06.jpg')}});">
                                <div class="time-event size10 txt6 effect1">
                                        <span class="txt-effect1 flex-c-m">
                                            08:00 AM Tuesday - 9 October 2018
                                        </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    Lipstick colors
                                </h4>

                                <p class="t-center">
                                    Come join us to know how big the lipstick it is !!
                                </p>

                                <div class="flex-sa-m flex-w w-full m-t-40">
                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 days">
                                                25
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Days
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 hours">
                                                12
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Hours
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 minutes">
                                                59
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Minutes
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 seconds">
                                                56
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Seconds
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick2 item3-slick2"
                 style="background-image: url({{asset('images/bg-event-04.jpg')}});">
                <div class="wrap-content-slide2 p-t-115 p-b-208">
                    <div class="container">
                        <!-- - -->
                        <div class="title-event t-center m-b-52">
                                <span class="tit2 p-l-15 p-r-15">
                                    Upcomming
                                </span>

                            <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                Events
                            </h3>
                        </div>

                        <!-- Block2 -->
                        <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"
                             data-appear="rotateInUpLeft">
                            <!-- Pic block2 -->
                            <a href="https://www.facebook.com/events/1888131387937410/" class="wrap-pic-blo2 bg3-blo2"
                               style="background-image: url({{asset('images/event-01.jpg')}});">
                                <div class="time-event size10 txt6 effect1">
                                        <span class="txt-effect1 flex-c-m">
                                            01:00 PM Tuesday - 28 September 2018
                                        </span>
                                </div>
                            </a>

                            <!-- Text block2 -->
                            <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                <h4 class="tit7 t-center m-b-10">
                                    Eating is no longer the enemy of Lipstick </h4>

                                <p class="t-center">
                                    Come and join the party to confirm that eating is no longer an enemy of Lipstick!
                                </p>

                                <div class="flex-sa-m flex-w w-full m-t-40">
                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 days">
                                                10
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Days
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 hours">
                                                12
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Hours
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 minutes">
                                                59
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Minutes
                                            </span>
                                    </div>

                                    <div class="size11 flex-col-c-m">
                                            <span class="dis-block t-center txt7 m-b-2 seconds">
                                                56
                                            </span>

                                        <span class="dis-block t-center txt8">
                                                Seconds
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="wrap-slick2-dots"></div>
    </div>
</section>
@endsection