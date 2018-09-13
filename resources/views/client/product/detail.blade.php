@extends("layouts.index")
@section('content')
@section('page-topic', $obj->name)
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('css/product-detail.css')}}">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/product-related-item.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/product-related-item.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">

<div style="background-color: white">
    <div class="container" style="padding: 50px;">
        <div>
            <div class="row">
                <aside class="col-sm-6">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div><a href="#"><img src="{{$obj->images}}" alt="{{$obj->name}}"></a></div>
                        </div>
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-6">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{$obj->name}}</h3>
                        <p class="price-detail-wrap m-t-30 m-b-30">

                            <span class="txt22 m-t-10">
                                @if($obj->isDiscount())
                                    <span class="font-weight-bold h3 text-danger product_price">VND {{$obj->discountPriceWithFormat}}
                                    </span>
                                    <del class="text-muted">
                                        <small>VND {{$obj->originalPriceWithFormat}}</small>
                                    </del>
                                @else
                                    <span class="font-weight-bold h3 text-danger product_price">VND {{$obj->originalPriceWithFormat}}
                                    </span>
                                @endif
                            </span>
                            <br>
                            <dl class="item-property">
                                <dt>Overview</dt>
                                <dd>
                        <p>{{$obj->overview}}</p></dd>
                        </dl>
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{$obj->description}}</p></dd>
                        </dl>
                        <hr>
                        <button class="btn btn-lg btn-danger text-uppercase add-to-cart" id="add-cart-{{$obj->id}}"><i
                                    class="fas fa-shopping-cart"></i> Add to cart
                        </button>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->
    </div>


    {{--Comment--}}
    <div class="text-center"><img src="{{asset('images/flower-line-broder-2.png')}}" width="50%"></img></div>
    <div class="blog text-center">
        <h3 class="tit2 text-center">
            Review Product
        </h3>
    </div>

    <div class="container m-b-20" style="padding-left: 50px;">
        <div class="row">
            <div class="col-md-12">
                @if(isset(Auth::user()->name))
                    <div class="widget-area no-padding blank">
                        <div class="col-lg-2 text-center p-t-15 m-r-15 image" style="background-color: #fcb1ae">{{Auth::user()->name[0]}}</div>
                        <div class="col-lg-10 status-upload">
                            <form name="post-comment" action="/post-comment" method="post">
                                <textarea placeholder="Review this product!" name="content"></textarea>
                                <input class="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input class="hidden" name="product_id" value="{{$obj->id}}">
                                <button type="button" class="btn btn-danger post-comment">Review</button>
                            </form>
                        </div><!-- Status Upload  -->
                    </div><!-- Widget Area -->
                @else
                    <div style="font-size: 16px">Please
                        <a href="/client-login"><span class="btn btn-danger">Log in</span></a> to be able to post review for this product</div>
                @endif
            </div>
        </div>
        <div class="text-center p-r-20 line-item-mainmenu bg3-pattern m-t-20" style="width: 90%"></div>
    </div>
    <div style="padding-left: 138px">
        <div class="comments row">
            {{--{{dd($comments)}}--}}
            @if(count($comments)>0)
                @foreach($comments as $comment)
                    <div class="col-sm-8">
                        <div class="panel panel-white post panel-shadow">
                            <div class="post-heading">
                                <div class="pull-left">
                                    <div class="image text-center p-t-15 avatar"
                                         style="background-color: #fcb1ae">{{$comment->userFirstChar}}</div>
                                </div>
                                <div class="pull-left meta m-l-30">
                                    <div class="userName title h5">
                                        <b>{{$comment->userComment}}</b>
                                        made a review.
                                    </div>
                                    <h6 class="text-muted time">{{$comment->created_at}}</h6>
                                </div>
                            </div>
                            <div class="post-description">
                                <p>{{$comment->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div>This product doesn't have any review</div>
            @endif
        </div>
    </div>

    <div class="text-center m-t-50 m-b-30"><img src="{{asset('images/flower-line-broder-2.png')}}" width="50%"></img>
    </div>

    {{--Related Products--}}
    <div class="container">
        <div class="blog">
            <h3 class="tit2 text-center">
                Related Products
            </h3>
        </div>
        <div class="row blog">
            <div class="col-md-12">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel" style="margin: 30px;">
                    <div style="display: none" id="hidden-list">
                        @foreach($list_obj as $item)
                            <div class="col-md-3">
                                <a href="/product/{{$item->id}}">
                                    <img src="{{$item->images}}" alt="Image" style="max-width:100%;">
                                    <div>{{$item->name}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel items -->
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="row">
                                @for ($i = 0; $i < 4; $i++)

                                    <div class="col-sm-3">
                                        <div class="imagebox">
                                            <a href="/product/{{$list_obj[$i]->id}}">
                                                <img src="{{$list_obj[$i]->images}}" alt="{{$list_obj[$i]->name}}"
                                                     style="max-width:100%;">
                                                <span class="imagebox-desc">{{$list_obj[$i]->name}}</span>
                                            </a>
                                        </div>
                                    </div>

                                @endfor
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                        <div class="carousel-item">
                            <div class="row">
                                @for ($i = 4; $i < 8; $i++)
                                    <div class="col-sm-3">
                                        <div class="imagebox">
                                            <a href="/product/{{$list_obj[$i]->id}}">
                                                <img src="{{$list_obj[$i]->images}}" alt="{{$list_obj[$i]->name}}"
                                                     style="max-width:100%;">
                                                <span class="imagebox-desc">{{$list_obj[$i]->name}}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <!--.row-->
                        </div>
                        <!--.item-->

                    </div>
                    <!--.carousel-inner-->


                </div>
                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--.Carousel-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/comment.js')}}"></script>
@endsection
