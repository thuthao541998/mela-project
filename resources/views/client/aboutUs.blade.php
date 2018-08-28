@extends("layouts.index")
@section('content')
@section('page-topic','About Us')
    <link href="{{asset('css/aboutUs.css')}}" rel='stylesheet' type='text/css' />
    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="about-title clearfix">
                        <h1>About <span>MELA</span></h1>
                        <h3>Our mission and vision </h3>
                        <div class="content text-justify">
                            <p>We're on a quest to bring the fun side of beauty to all—constantly delighting our guests with All Things Beauty, All in One Place™ while offering rewarding careers for our passionate, beauty-loving associates. </p>
                            <p>Our Vision: To be the most-loved beauty destination of our guests and the most-admired retailer by our Ulta Beauty associates, communities, partners and investors.</p>
                            <p>Our Mission: Every day we use the power of beauty to bring to life the possibilities that lie within each of us – inspiring every guest and enabling each associate to build a fulfilling career.</p>
                           </div>
                        <div class="about-icons">
                            <ul >
                                <li><a href="https://www.facebook.com/MelaHanoi"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a> </li>
                                <li><a href="https://twitter.com/"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a> </li>
                                <li> <a href="https://plus.google.com/"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a> </li>
                                <li> <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="about-img">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </div>
                    <div class="counter ">
                        <div class="single-counter text-center">
                            <h2 class="counter">1500</h2>
                            <p>Product</p>
                        </div>

                        <div class="single-counter text-center">
                            <h2 class="counter">10</h2>
                            <p>Brand</p>
                        </div>

                        <div class="single-counter text-center">
                            <h2 class="counter">5</h2>
                            <p>Category</p>
                        </div>

                        <div class="single-counter text-center">
                            <h2 class="counter">6000</h2>
                            <p>Customer</p>
                        </div>
                    </div>

                    </div>
            </div>
        </div>
    </div>
@endsection