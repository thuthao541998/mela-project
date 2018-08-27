@extends("layouts.index")
@section('content')
@section('page-topic','LIST ARTICLE')
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/><![endif]-->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0' name='viewport'/>
    <link rel="stylesheet" type="text/css" href="//hstatic.net/0/0/global/design/member/fonts-master/roboto.css">
    <link href='//theme.hstatic.net/1000246282/1000396748/14/style.css?v=36' rel='stylesheet' type='text/css'
          media='all'/>
    <link href='//theme.hstatic.net/1000246282/1000396748/14/responsive.css?v=36' rel='stylesheet' type='text/css'
          media='all'/>
    {{--font google--}}
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400italic' rel='stylesheet' type='text/css'>
    {{--read more css js--}}
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/readMore.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/readMore.js')}}"></script>

    <div class="text-center mt-5 fs-75" style="font-family: 'Lobster', cursive;">List Article</div>
    <div id="blog-template">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="blog-list-articles lists-articles " id="list-articles">
                        {{-- Bắt vòng lặp list_obj ở đây --}}
                        @foreach($list_obj as $item)
                            <li class="clearfix ">
                                <div class="blog-item-image col-lg-3">
                                    <a href="/article/{{$item->id}}">
                                        <div style="background-image:url('{{$item->images}}');background-position: center; width:100% ; height: 140px;"></div>
                                    </a>
                                </div>
                                <div class="blog-item-title ml-2">
                                    <a href="/article/{{$item->id}}" title="{{$item->title}}">
                                        <h2 style="font-weight: 600; font-family: 'Comfortaa', cursive;line-height:1.1; font-size: 1.5em;margin-bottom: 5px; text-transform: uppercase;">{{$item->title}}</h2>
                                    </a>
                                    <a href="#">
                                        <h4 style="color: #5a6268; font-size: 0.8em; text-transform: capitalize;">By : {{$item->author}}</h4>
                                    </a>
                                    <p>
                                        {{-- Cần xử lí chuyển sang định dạng ngày-tháng-năm --}}
                                        {{$item->created_at}}
                                    </p>
                                    {{-- Cần xử lí rút ngắn bớt content lại tầm 50 chữ ở đây --}}
                                    <div class="blog-content-short-description more" style="font-family: 'Montserrat Alternates', sans-serif;">{{$item->content}}</div>
                                </div>
                            </li>
                            <hr/>
                        @endforeach
                    </ul>
                    <div class="pagination pull-right">
                        {!! $list_obj->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
