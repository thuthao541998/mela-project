@extends("layouts.index")
@section('content')
@section('page-topic','CONTACT US')

<link href="{{asset('css/contactUs.css')}}" rel='stylesheet' type='text/css' />

                    <section class="section-contact bg1-pattern p-b-113">
                        <div class="topic text-center">
                            <p>MELA COSMETICS</p>
                            <h1>CONTACT US</h1>
                        </div>
                        <!-- Map -->
                        <div class="container">
                            <div class="map bo8 bo-rad-10 of-hidden">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1186727365266!2d105.78188298381623!3d21.027937099878503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3aa600d69%3A0x11275455cd98079!2zVMO0biBUaOG6pXQgVGh1eeG6v3QsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1512029986933"
                                        frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>

                        {{--Contact form?--}}

                        <div class="container">
                            <h3 class="tit7 t-center p-b-62 p-t-105">
                                Send us a Message
                            </h3>

                            <form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="{{url('/contact-us')}}">
                                {{ csrf_field() }}
                                {{--@csrf--}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Name -->
                                        <span class="txt9">
							Name
						</span>

                                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                            <input class="bo-rad-10 sizefull txt10 p-l-20 " id="name" type="text" name="name" placeholder="Name"
                                            @if(Auth::user())
                                                value="{{Auth::user() -> name}}"
                                            @endif
                                            >
                                            <div class="mustname" style="display: none">
                                                Please enter Your Name
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Email -->
                                        <span class="txt9">
							Email
						</span>

                                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                            <input class="bo-rad-10 sizefull txt10 p-l-20 email" type="text" name="email" placeholder="Email"
                                           @if(Auth::user())
                                               value="{{Auth::user() -> email}}"
                                            @endif
                                            >
                                            <div class="mustemail" style="display: none">
                                                Please enter Your Email
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Phone -->
                                        <span class="txt9">
							Phone
						</span>

                                        <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                            <input class="bo-rad-10 sizefull txt10 p-l-20 phone" type="text" name="phone" placeholder="Phone">
                                            <div class="mustphone" style="display: none">
                                                Please enter Your Phone
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <!-- Message -->
                                        <span class="txt9">
							Message
						</span>
                                        <textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3 message" name="message" placeholder="Message" ></textarea>
                                        <div class="mustmessage" style="display: none">
                                            Please enter Your Message
                                        </div>
                                    </div>
                                </div>

                                <div class="wrap-btn-booking flex-c-m m-t-13">
                                    <!-- Button3 -->
                                    <button type="button" class="btn3 flex-c-m size36 txt11 trans-0-4 send">
                                        Submit
                                    </button>
                                </div>
                            </form>

                        </div>
        </div>
        </div>
        <div class="bottom text-center">
            <p>VĂN PHÒNG ĐẠI DIỆN & KINH DOANH</p>
            <p>
                <span class="fa fa-map-marker"></span>&nbsp Địa chỉ: Đại học FPT - Tôn Thất Thuyết,Cầu Giấy, Hà Nội, Việt Nam</p>
            <p>
                <span class="fa fa-phone"></span>&nbsp Điện thoại: 123-456-789</p>
            <p>
                <span class="fa fa-fax"></span>&nbsp Fax: (84-236) 3749 889 | 882 </p>
            <p class="sMedia">
                <a href="#">
                    <span class="fab fa-instagram text-black"></span>
                </a>&nbsp&nbsp
                <a href="#">
                    <span class="fab fa-twitter text-black"></span>
                </a>&nbsp&nbsp
                <a href="#">
                    <span class="fab fa-facebook text-black"></span>
                </a>
            </p>
        </div>
    </section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('js/contactUs.js')}}"></script>
@endsection