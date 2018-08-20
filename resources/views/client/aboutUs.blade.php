@extends("layouts.index")
@section('content')
    <link href="{{asset('css/aboutUs.css')}}" rel='stylesheet' type='text/css' />
    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="about-title clearfix">
                        <h1>About <span>MELA</span></h1>
                        <h3>Lorem ipsum dolor sit amet </h3>
                        <div class="content text-justify">
                            <p class="about-paddingB">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet dolor libero, eget venenatis mauris finibus dictum. Vestibulum quis elit eget neque porttitor congue non sit amet dolor.</p>
                            <p>Proin pretium purus a lorem ornaresed lobortis pulvinar. </p>
                            <p>Integer laoreet mi id eros porta euismod. Suspendisse potenti. Nulla eros mauris, convallis et sem tempus, viverra hendrerit sapien</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
                        </div>
                        <div class="about-icons">
                            <ul >
                                <li><a href="https://www.facebook.com/"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a> </li>
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