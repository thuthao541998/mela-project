@extends("layouts.index")
@section('content')
@section('page-topic','Shop Now')
<section class="bg1-pattern">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="p-t-40 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
                    <div class="text-blo4 p-t-10 p-b-20 text-center">
                        <h3 class="p-b-16">{{$obj->title}}</h3>
                        <div class="txt28 p-b-24 text-right">
                            <span>by {{$obj->author}}
                                <span class="m-r-6 m-l-4">|</span>
                            </span>

                            <span>{{$obj->createdAt}}
                                <span class="m-r-6 m-l-4">|</span>
                            </span>
                        </div>
                    </div>


                    <div class="blo4 p-b-63">
                        <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative col-lg-6">
                            <a href="#">
                                <img src="{{$obj->images}}" alt="IMG-BLOG" class="img-thumbnail" style="width: 90%">
                            </a>
                        </div>

                        <div class="text-blo4 p-t-5 p-b-30 col-lg-6">{!! $obj->content !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection