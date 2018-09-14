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
                                <div>
                                    <div class="input-group col-md-4">
                                        <input type="text" class="search search-query form-control" placeholder="Search"
                                               value="{{isset($search) ? $search : ''}}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-search" type="button">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class=" dropdown filter-btn form-inline">
                                <div class="form-group mx-sm-4 mb-3">
                                    <label for="sortProduct">Sort by</label>
                                    <select id="select-action" name="sort-product" class="form-control">
                                        <option selected value="0">All</option>
                                        <option value="1">A - Z</option>
                                        <option value="2">Z - A</option>
                                        <option value="3">Price (low to high)</option>
                                        <option value="4">Price (high to low)</option>
                                    </select>
                                </div>
                            </div>
                            @if(count($list_obj)>0 && isset($list_obj))
                                <div class="product-title">PRODUCT LIST [{{count($list_obj)}}]</div>
                                <div class="wrap-item-mainmenu p-b-22" id="results">
                                    @foreach($list_obj as $obj)
                                        <div class="sort-item">
                                            <div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20">
                                                <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">

                                                    <a href="/product/{{$obj->id}}"><img src="{{$obj->images}}"
                                                                                         alt="IMG-MENU"
                                                                                         style="width: 100%;height: 150%;"></a>
                                                </div>
                                                <div class="text-blo3 size21 flex-col-l-m">
                                                    <a href="/product/{{$obj->id}}" class="txt21 m-b-3 product_name">
                                                        {{$obj->name}}
                                                        @if($obj->isDiscount())
                                                            <span style="background-color: red; color:white;"
                                                                  class="p-l-6 p-r-5">SALE {{$obj->discount}}%</span>
                                                        @endif
                                                        @if($obj->isNew())
                                                            <span class="font-weight-bold"
                                                                  style="background-color: green; color:white;">NEW</span>
                                                        @endif
                                                    </a>
                                                    <span class="txt23">
                                                    {{$obj->overview}}
                                                </span>
                                                    <span class="txt22 m-t-10">
                                                    @if($obj->isDiscount())
                                                            <span class="font-weight-bold product_price">{{$obj->discountPriceString}}
                                                        </span>
                                                            <del class="text-muted">
                                                            <small>{{$obj->originalPriceString}}</small>
                                                        </del>
                                                        @else
                                                            <span class="font-weight-bold">{{$obj->originalPriceString}}
                                                        </span>
                                                        @endif
                                            </span>
                                                    <button class="add-cart-large add-to-cart m-t-10"
                                                            id="add-cart-{{$obj->id}}"><i
                                                                class="fas fa-cart-plus fa-2x"></i></button>
                                                </div>
                                                <div class="line-item-mainmenu bg3-pattern m-t-25"></div>
                                            </div>
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
                </div>
            </main>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('body').on('change', '.filter-btn select[name=sort-product]', function () {
            var sortVal = $('.filter-btn select[name=sort-product]').val();

            switch (sortVal) {
                // Sort by A-Z
                case '1':
                    var list, i, switching, b, shouldSwitch;
                    list = document.getElementsByClassName('product_name');

                    switching = true;
                    /* Make a loop that will continue until
                    no switching has been done: */
                    while (switching) {
                        // Start by saying: no switching is done:
                        switching = false;
                        b = document.getElementsByClassName("sort-item");
                        // Loop through all list items:
                        for (i = 0; i < (list.length - 1); i++) {
                            // Start by saying there should be no switching:
                            shouldSwitch = false;
                            /* Check if the next item should
                            switch place with the current item: */
                            if (list[i].innerHTML.toLowerCase() > list[i + 1].innerHTML.toLowerCase()) {
                                /* If next item is alphabetically lower than current item,
                                mark as a switch and break the loop: */
                                shouldSwitch = true;
                                break;
                            }
                        }
                        if (shouldSwitch) {
                            /* If a switch has been marked, make the switch
                            and mark the switch as done: */
                            b[i].parentNode.insertBefore(b[i + 1], b[i]);
                            switching = true;
                        }
                    }
                    break;

                // Sort by Z-A
                case '2':
                    var list, i, switching, b, shouldSwitch;
                    list = document.getElementsByClassName('product_name');

                    switching = true;
                    while (switching) {
                        switching = false;
                        b = document.getElementsByClassName("sort-item");
                        for (i = 0; i < (list.length - 1); i++) {
                            shouldSwitch = false;
                            if (list[i].innerHTML.toLowerCase() < list[i + 1].innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                        if (shouldSwitch) {
                            b[i].parentNode.insertBefore(b[i + 1], b[i]);
                            switching = true;
                        }
                    }
                    break;

                // Sort by price (low to high)
                case '3':
                    var list, i, switching, b, shouldSwitch;
                    list = document.getElementsByClassName('product_price');

                    switching = true;
                    while (switching) {
                        switching = false;
                        b = document.getElementsByClassName("sort-item");
                        for (i = 0; i < (list.length - 1); i++) {
                            shouldSwitch = false;
                            if (list[i].innerHTML.toLowerCase() > list[i + 1].innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                        if (shouldSwitch) {
                            b[i].parentNode.insertBefore(b[i + 1], b[i]);
                            switching = true;
                        }
                    }
                    break;

                // Sort by price (high to low)
                case '4':
                    var list, i, switching, b, shouldSwitch;
                    list = document.getElementsByClassName('product_price');

                    switching = true;
                    while (switching) {
                        switching = false;
                        b = document.getElementsByClassName("sort-item");
                        for (i = 0; i < (list.length - 1); i++) {
                            shouldSwitch = false;
                            if (list[i].innerHTML.toLowerCase() < list[i + 1].innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                        if (shouldSwitch) {
                            b[i].parentNode.insertBefore(b[i + 1], b[i]);
                            switching = true;
                        }
                    }
                    break;

                default:
                    break;
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.3/pagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.3/pagination.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script>
    var searchfunction = function () {
        {
            var today = new Date();
            var lastWeek = Date.parse(new Date(today.getFullYear(), today.getMonth(), today.getDate() - 7));
            var query = $('.search').val();
            if (query) {
                $.ajax({
                    url: "{{ route('search.action') }}",
                    method: 'GET',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        query: query
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var limit = 10;
                        var list_obj = data.list_obj;
                        var count = list_obj.length;
                        var totalPage = Math.ceil(count / 10);
                        if (count > 0) {
                            var content = '';
                            for (var i in list_obj) {
                                content += '<div class="blo3 flex-w flex-col-l-sm m-t-30 m-b-20 show_product">';
                                content += '<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">';

                                content += '<a href="/product/' + list_obj[i].id + '"><img src="' + list_obj[i].images + '" alt="IMG-MENU" style="width: 100%;height: 100%;"></a>';
                                content += '</div>';
                                content += '<div class="text-blo3 size21 flex-col-l-m">';
                                content += '<a href="/product/' + list_obj[i].id + '" class="txt21 m-b-3">';
                                content += list_obj[i].name;
                                if(list_obj[i].original_price_string != list_obj[i].discount_price_string ){
                                    content += '<span style="background-color: red; color:white;" class="p-l-6 p-r-5">SALE ' + list_obj[i].discount + '%</span>';}
                                if(list_obj[i].created_at < today && list_obj[i].created_at> lastWeek){
                                    content += '<span class="p-l-2 p-r-2 font-weight-bold m-l-5" style="background-color: green; color:white;">NEW</span>';}
                                content += '</a>';
                                content += '<span class="txt23">';
                                content += list_obj[i].overview;
                                content += '</span>';
                                content += '<span class="txt22 m-t-10">';
                                if(list_obj[i].original_price_string != list_obj[i].discount_price_string){
                                    content += '<span class="font-weight-bold">' + list_obj[i].discount_price_string;
                                content += '</span>';
                                content += '<del class="text-muted">';
                                content += '<small>' + list_obj[i].original_price_string + '</small>';
                                content += '</del>';}
                                else{
                                    content += '<span class="font-weight-bold">' + list_obj[i].original_price_string;
                                content += '</span>';}
                                    content += '</span>';
                                content += '<button class="add-cart-large add-to-cart m-t-10"  id="add-cart-' + list_obj[i].id + '"><i class="fas fa-cart-plus fa-2x"></i></button>';
                                content += '</div>';
                                content += '</div>';
                                content += '<div class="line-item-mainmenu bg3-pattern"></div>';
                            }
                            ;

                            var page = 1;
                            var paginateContent = '';
                            paginateContent += '<ul class="pagination" role="navigation">';
                            if (page > 2) {
                                paginateContent += '<li class="page-item"><a class="page-link" href="#">' + (page - 2) + '</a></li>';
                            }
                            if (page > 1) {
                                paginateContent += '<li class="page-item"><a class="page-link" href="#">' + (page - 1) + '</a></li>';
                            }
                            paginateContent += '<li class="active page-item"><a class="page-link" href="#">' + page + '</a></li>';
                            if (totalPage > page) {
                                paginateContent += '<li class="page-item"><a class="page-link" href="#">' + (page + 1) + '</a></li>';
                            }
                            if ((totalPage - 1) > page) {
                                paginateContent += '<li class="page-item"><a class="page-link" href="#">' + (page + 2) + '</a></li>';
                            }
                            paginateContent += '</ul>';


                            $('.product-title').html('PRODUCT LIST [' + count + ']');
                            $('#results').html(content);
                            $('.pagination').html(paginateContent);


                            // Pagination
                            var pageSize = 10;

                            showPage = function (page) {
                                $(".show_product").hide();
                                $(".show_product").each(function (n) {
                                    if (n >= pageSize * (page - 1) && n < pageSize * page)
                                        $(this).show();
                                });
                            };

                            showPage(1);

                            $("body").on('click', '.pagination li a', function () {
                                $(".pagination li").removeClass("active");
                                $(this).parent().addClass("active");
                                showPage(parseInt($(this).text()));
                            });
                        } else {
                            swal("There is no products matched your search! Please try again!", {
                                icon: "warning",
                            });
                        }
                    },
                    error: function () {
                        swal("There's an error! Please try again!", {
                            icon: "warning",
                        });
                    }
                })
            }
        }
    };

    $('.search-query').keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            searchfunction();
        }
    });
    $('.input-group-btn').click(function () {
        searchfunction();
    });
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.formatNumber-0.1.1.min.js')}}"></script>

@endsection