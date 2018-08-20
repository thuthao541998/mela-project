@extends("layouts.index")
@section('content')
    <link href="{{asset('css/contactUs.css')}}" rel='stylesheet' type='text/css' />
    <section>
        <div class="container-map">
            <div class="row-fluid">
                <div class="middle">
                    <div class="topic text-center">
                        <p>MELA COSMETICS</p>
                        <h1>CONTACT US</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 ift">
                            <p class="text-justify">Trong trường hợp quý khách có bất kì thắc mắc hoặc đóng góp nào, xin vui lòng liên hệ với chúng tôi theo thông
                                tin dưới đây. Chúng tôi sẽ phản hồi lại quý khách trong thời gian sớm nhất.</p>
                            <p class="fzone">Fun Zone</p>
                            <p>
                                <span class="fa fa-map-marker"></span>&nbsp Địa chỉ: Đại học FPT - Tôn Thất Thuyết,Cầu Giấy, Hà Nội, Việt Nam</p>
                            <p>
                                <span class="fa fa-phone"></span>&nbsp Điện thoại: 123-456-789</p>
                            <p>
                                <span class="fa fa-fax"></span>&nbsp Fax: (84-236) 3749 889 | 882 </p>
                            <p>
                                <span class="fa fa-envelope"></span>&nbsp E-mail (kinh doanh): <a href="mailto:hoangnvd00536@fpt.edu.vn" target="_top">abc@fpt.edu.vn</a></p>
                            <p>
                                <span class="fa fa-tag"></span>&nbsp
                                <a href="#">funzone.vn</a>
                            </p>
                        </div>
                        <div class="col-lg-6 col-sm-12 send-email">
                        <h4 class="s-e-title">We are here assist you.</h4>
                        <table class="container-fluid">
                            <tr>
                                <td>
                                    <span class="fa fa-address-card"></span>
                                </td>
                                <td class="subject">Name</td>
                                <td>
                                    <input type="text" name="name" value="" class="fill name">
                                    <p class="must mustname">Your Name</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa fa-map-marker"></span>&nbsp</td>
                                <td class="subject">Address</td>
                                <td>
                                    <input type="text" name="address" value="" class="fill address">
                                    <p class="must mustaddress">Your address</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa fa-phone"></span>&nbsp</td>
                                <td class="subject">Phone Number</td>
                                <td>
                                    <input type="text" name="phone" value="" class="fill phone">
                                    <p class="must mustphone">Your Phone Number</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa fa-envelope"></span>&nbsp</td>
                                <td class="subject">Email</td>
                                <td>
                                    <input type="text" name="email" value="" class="fill email">
                                    <p class="must mustemail">Your Email</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa fa-info"></span>&nbsp</td>
                                <td class="subject">Title</td>
                                <td>
                                    <input type="text" name="title" value="" class="fill">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fa fa-pencil-square-o"></span>&nbsp</td>
                                <td class="subject"> Message</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control fillbig info" id="exampleTextarea" rows="3" name="content"></textarea>
                                    </div>
                                    <p class="must mustinfo">Your Message</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="send btn btn-danger" id="submitBtn">Submit</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="span8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.1186727365266!2d105.78188298381623!3d21.027937099878503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b3aa600d69%3A0x11275455cd98079!2zVMO0biBUaOG6pXQgVGh1eeG6v3QsIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1512029986933"
                    frameborder="0" style="border:0" allowfullscreen></iframe>
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
    <script src="{{asset('js/contactUs.js')}}"></script>
@endsection