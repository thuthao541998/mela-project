@extends('layouts.index')
@section('content')
@section('page-topic','LIST PRODUCT')

<div class="content">
    <!-- Main menu -->
    <div class="container-fluid row bg1-pattern">
        <div class="col-lg-3 p-l-0 p-r-0 m-t-40 side-bar ">
            <section class="bg1-pattern">
                <link rel="stylesheet" type="text/css" href="{{asset('css/list_product.css')}}">
                <a href="/list-product"><h4 class="all-product">All</h4></a>
                <div class="css-treeview">
                    <h4>Categories</h4>
                    <ul class="tree-list-pad">
                        @foreach($categories as $category)
                            <li class="font-weight-bold">
                                <a href="{{url()->current().'?categoryId='.$category->id}}">
                                    <span class="{{$category->id==$choosedCategoryId?'text-danger':''}}">{{$category->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="css-treeview">
                    <h4>Brands</h4>
                    <ul class="tree-list-pad">
                        @foreach($brands as $brand)
                            <li>
                                <a href="{{url()->current().'?brandId='.$brand->id}}">
                                    <span class="{{$brand->id==$choosedBrandId?'text-danger':''}}">{{$brand->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <div class="col-lg-9 p-l-0 p-r-0 m-t-40">
            <main class="section-mainmenu p-t-30 p-b-70 bg1-pattern">
                <div class="container">
                    <div class="row p-t-10 p-b-70">
                        <div class="col-md-10 col-lg-10 p-r-35 p-r-15-lg m-l-r-auto">
                            <div id="custom-search-input">
                                <form action="{{route('search.action')}}" method="GET">
                                    <div class="input-group col-md-4">
                                        <input type="text" class="search search-query form-control" placeholder="Search"
                                        value="{{isset($search) ? $search : ''}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-search" type="button">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class=" dropdown filter-btn form-inline">
                                <div class="form-group mx-sm-4 mb-3">
                                    <label for="chooseCategory">Sort by</label>
                                    <select id="select-action" name="categoryId" class="form-control">
                                        <option selected value="1">A - Z</option>
                                        <option selected value="2">Z - A</option>
                                        <option selected value="3">Price (low to high)</option>
                                        <option selected value="4">Price (high to low)</option>
                                    </select>
                                </div>
                            </div>
                            @if(count($list_obj)>0)
                                <div class="product-title">PRODUCT LIST [{{count($list_obj)}}]</div>
                                <div class="wrap-item-mainmenu p-b-22" id="results">
                                    @foreach($list_obj as $obj)
                                        <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">
                                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">

                                                <a href="/product/{{$obj->id}}"><img src="{{$obj->images}}" alt="IMG-MENU"
                                                                 style="width: 180px; height: 180px"></a>
                                            </div>
                                            <div class="text-blo3 size21 flex-col-l-m">
                                                <a href="/product/{{$obj->id}}" class="txt21 m-b-3">
                                                    {{$obj->name}}
                                                    @if($obj->isDiscount())
                                                        <span style="background-color: red; color:white;"
                                                              class="p-l-6 p-r-5">SALE {{$obj->discount}}%</span>
                                                    @endif
                                                    @if($obj->isNew())
                                                        <span class="font-weight-bold" style="background-color: green; color:white;">NEW</span>
                                                    @endif
                                                </a>
                                                <span class="txt23">
                                                    {{$obj->overview}}
                                                </span>
                                                <span class="txt22 m-t-10">
                                                    @if($obj->isDiscount())
                                                        <span class="font-weight-bold">{{$obj->discountPriceString}}
                                                        </span>
                                                        <del class="text-muted">
                                                            <small>{{$obj->originalPriceString}}</small>
                                                        </del>
                                                    @else
                                                        <span class="font-weight-bold">{{$obj->originalPriceString}}
                                                        </span>
                                                    @endif
                                            </span>
                                                <button class="add-cart-large add-to-cart m-t-10"  id="add-cart-{{$obj->id}}"><i
                                                            class="fas fa-cart-plus fa-2x"></i></button>
                                            </div>
                                        </div>
                                        <div class="line-item-mainmenu bg3-pattern"></div>
                                    @endforeach
                                </div>
                                <div class="pagination">
                                    {!! $list_obj->links() !!}
                                </div>
                            @else
                                <div class="no-product">
                                    <h4>Have no product in this field</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $('.btn-search').click(function () {
        var query = $('.search').val();
        if (query) {
            $.ajax({
                url:"{{ route('search.action') }}",
                method:'GET',
                data:{
                    query:query
                },
                dataType:'json',
                success: function(data)
                {
                    console.log(data.list_obj);
                    var list_obj = data.list_obj;
                    var count = list_obj.length;
                    if (count > 0){
                        var content = '';

                        for (var i in list_obj) {
                            content += '<div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">';
                            content += '<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">';

                            content += '<a href="/product/' + list_obj[i].id + '"><img src="' + list_obj[i].images + '" alt="IMG-MENU" style="width: 180px; height: 180px"></a>';
                            content += '</div>';
                            content += '<div class="text-blo3 size21 flex-col-l-m">';
                            content += '<a href="/product/' + list_obj[i].id + '" class="txt21 m-b-3">';
                            content += list_obj[i].name;
                            @if($obj->isDiscount())
                                content += '<span style="background-color: red; color:white;" class="p-l-6 p-r-5">SALE ' + list_obj[i].discount + '%</span>';
                            @endif
                            @if($obj->isNew())
                                content += '<span class="font-weight-bold" style="background-color: green; color:white;">NEW</span>';
                            @endif
                            content += '</a>';
                            content += '<span class="txt23">';
                            content += list_obj[i].overview;
                            content += '</span>';
                            content += '<span class="txt22 m-t-10">';
                            @if($obj->isDiscount())
                                content += '<span class="font-weight-bold">' + list_obj[i].discountPriceString;
                                content += '</span>'
                                content += '<del class="text-muted">';
                                content += '<small>' + list_obj[i].originalPriceString + '</small>';
                                content += '</del>'
                            @else
                                content += '<span class="font-weight-bold">' + list_obj[i].originalPriceString;
                                content += '</span>';
                            @endif
                            content += '</span>';
                            content += '<button class="add-cart-large add-to-cart m-t-10"  id="add-cart-' + list_obj[i].id + '"><i class="fas fa-cart-plus fa-2x"></i></button>';
                            content += '</div>';
                            content += '</div>';
                            content += '<div class="line-item-mainmenu bg3-pattern"></div>';
                        };

                        $('.product-title').html('PRODUCT LIST [' + count + ']');
                        $('#results').html(content);
                    } else {
                        swal("There is no products matched your search! Please try again!", {
                            icon: "warning",
                        });
                    }
                },
                error: function () {
                    swal("Please try again!", {
                        icon: "warning",
                    });
                }
            })
        }
    });

</script>
@endsection