<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0' name='viewport' />
    <link rel="stylesheet" type="text/css" href="//hstatic.net/0/0/global/design/member/fonts-master/roboto.css">
    <link href='//theme.hstatic.net/1000246282/1000396748/14/style.css?v=36' rel='stylesheet' type='text/css'  media='all'  />
    <link href='//theme.hstatic.net/1000246282/1000396748/14/responsive.css?v=36' rel='stylesheet' type='text/css'  media='all'  />

    <div id="blog-template">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <ul class="blog-list-articles lists-articles " id="list-articles">
                    {{-- Bắt vòng lặp list_obj ở đây --}}
                    @foreach($list_obj as $item)
                        <li class="clearfix">
                            <div class="blog-item-image">
                                <a href="/{{$item->id}}">
                                    <img src="{{$item->images}}" alt="{{$item->title}}" title="{{$item->title}}"/>
                                </a>
                            </div>
                            <div class="blog-item-title">
                                <a href="/{{$item->id}}" title="{{$item->title}}">
                                    <h2 style="text-transform: capitalize;">{{$item->title}}</h2>
                                </a>
                                <p>
                                    {{-- Cần xử lí chuyển sang định dạng ngày-tháng-năm --}}
                                    {{$item->created_at}}
                                </p>
                                {{-- Cần xử lí rút ngắn bớt content lại tầm 50 chữ ở đây --}}
                                <div class="blog-content-short-description">{{$item->content}}</div>
                            </div>
                        </li>
                        <hr />
                    @endforeach
                </ul>
                <div class="col-xs-12 clearfix loadmore">
                    <a href="javascript:" class="btn-loading">Load more articles</a>
                </div>
            </div>
        </div>
    </div>
</div>