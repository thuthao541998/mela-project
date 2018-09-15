@extends('layouts.master')
@section('page-title', 'List Product - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('css/readMore.css')}}" rel='stylesheet' type='text/css'/>
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order {{$order->id}}
                </div>
                <div class="alert alert-success hidden mt-2 ml-2 mr-2" role="alert" id="messageSuccess"></div>
                <div class="alert alert-danger hidden mt-2 ml-2 mr-2" role="alert" id="messageError"></div>
                <div>
                    {{--<div class="form-group mx-sm-4 mb-3 ml-5">--}}
                    {{--<a href="/admin/order" class="col-lg-3">--}}
                    {{--<i class="fas fa-caret-square-left "></i> Back to list order--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="filter-btn form-inline" action="/admin/product" method="GET">--}}
                    {{--<div class="form-group mx-sm-4 mb-3">--}}
                    {{--<label for="chooseCategory">Category</label>--}}
                    {{--<select id="select-action" name="categoryId" class="form-control">--}}
                    {{--<option selected value={{$null}}>All</option>--}}
                    {{--@foreach($categories as $category)--}}
                    {{--<option value="{{$category->id}}"{{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="form-group mx-sm-4 mb-3">--}}
                    {{--<label for="chooseBrand">Brand</label>--}}
                    {{--<select id="select-action" name="brandId" class="form-control">--}}
                    {{--<option selected value="{{$null}}">All</option>--}}
                    {{--@foreach($brands as $brand)--}}
                    {{--<option value="{{$brand->id}}"{{$brand->id==$choosedBrandId?'selected':''}}>{{$brand->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div>
                    <table class="table table-light pl-4 float-lg-none">
                        <thead>
                        <tr>
                            <th class="column-4"></th>
                            <th class="column-2 text-center">Id</th>
                            <th class="column-3">Name</th>
                            <th class="column-4">Images</th>
                            <th class="column-5 text-center">Quantity</th>
                            <th class="column-6 text-center">Unit price</th>
                            <th class="column-7 text-center">Total</th>
                            <th class="column-9">Created Time</th>
                            <th class="column-8 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--{{$order_details}}--}}
                        @foreach($order_details as $item)
                            <tr id="row-item-{{$item->product->id}}">
                                <td class="column-1" style="width: 3%">
                                    <input type="checkbox">
                                </td>
                                <td class="column-2 text-center">{{$item->product->id}}</td>
                                <td class="column-3 ">{{$item->product->name}}</td>
                                <td class="column-4 "><img src="{{$item->product->images}}" class="card"
                                                           style="background-size: cover; width: 80px; height: 80px;">
                                </td>
                                <td class="column-5 text-center">{{$item->quantity}}</td>
                                <td class="column-6 text-center">
                                    {{$item->product->discount_price_string}}
                                    @if($item->product->original_price_string != $item->product->discount_price_string)
                                        <div>
                                            <del class="text-danger">{{$item->product->original_price_string}}</del>
                                        </div>
                                    @endif
                                </td>
                                <td class="column-7 text-center total-unit">{{$item->totalUnit}}
                                    (vnd)
                                </td>
                                <th class="column-9" style="font-weight: normal;">{{$item->created_at}}</th>
                                <td class="column-8 text-center">
                                    <a href="javascript:void(0)"
                                       class="btn btn-link btn-delete btn-delete-product p-t-0" data-toggle="tooltip"
                                       title="Delete" data-placement="top"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mr-5">
                        <span class="text-right font-weight-bold" style="font-size: 16px; font-weight: bold">Total : </span>
                        <span class="text-center" style="font-size: 16px">{{$order->total_money_with_format}} (vnd)</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" value="" id="check-all">
                                <select class="form-control" id="select-action" name="select-action">
                                    <option selected value="0">Action</option>
                                    <option value="1">Delete All</option>
                                    <option value="2">Another Action</option>
                                </select>
                                <button type="submit" class="btn btn-primary ml-2" id="btn-apply-product">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="pagination pull-right">
                        {{--{!! $list_obj->links() !!}--}}
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
