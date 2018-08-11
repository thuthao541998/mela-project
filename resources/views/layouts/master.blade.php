<!doctype html>
<head>
    <title>@yield('page-title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="{{asset('js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="#" class="logo">
                MELA
            </a>
            <div class="sidebar-toggle-box">
                <div class="fas fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                    <!-- Bắt sự kiện search ở đây -->
                </li>
                <!-- user login dropdown start-->
                <!-- Xử lí login admin ở đây -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fas fa-user-alt" style="margin: 0.6em;"></i>
                        <span class="username">John Doe</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fas fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fas fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fas fa-gift"></i>
                            <span>Product Manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Add Product</a></li>
                            <li><a href="#">List All Products</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fas fa-archive"></i>
                            <span>Category Manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Add Category</a></li>
                            <li><a href="#">List All Categories</a></li>
                        </ul>
                    </li>
                    {{--Brand Manager--}}

                    {{--<li class="sub-menu">--}}
                        {{--<a href="javascript:;">--}}
                            {{--<i class="fas fa-trademark"></i>--}}
                            {{--<span>Brand Manager</span>--}}
                        {{--</a>--}}
                        {{--<ul class="sub">--}}
                            {{--<li><a href="#">Add Brand</a></li>--}}
                            {{--<li><a href="#">List All Brands</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fas fa-clipboard"></i>
                            <span>Order Manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Add Order</a></li>
                            <li><a href="#">List All Orders</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fas fa-user"></i>
                            <span>Client Manager</span>
                        </a>
                        <ul class="sub">
                            <!-- Có nên cho add client vào không? -->
                            <!-- <li><a href="#">Add Client</a></li> -->
                            <li><a href="#">List All Clients</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @section('content')
            @show
        </section>
        <!-- footer -->
        <div class="footer">
            <div>
                <h3 style="color: #744e7d; margin-bottom: 0.3em">MELA PROJECT ©</h3>
                <p>A product of Untitled 2018 and Nh0kjapan</p>
            </div>
            <div class="wthree-copyright" style="margin: 4em 0 0 0;">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
</body>
</html>