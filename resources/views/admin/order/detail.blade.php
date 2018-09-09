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
                        <tr class="row col-md-12 col-sm-12 col-lg-12">
                            <th class="col-xsm-1" style="width: 3%"></th>
                            <th class="col-xs-1 text-center">Id</th>
                            <th class="col-xs-2 col-md-2 col-sm-2 ">Name</th>
                            <th class="col-xs-2 col-md-2 col-sm-2 ">Images</th>
                            <th class="col-xs-1 col-md-1 col-sm-1 text-center">Quantity</th>
                            <th class="col-xs-2 col-md-2 col-sm-2 text-center">Unit price</th>
                            <th class="col-xs-2 col-md-2 col-sm-2 text-center">Total</th>
                            <th class="col-xs-1 col-md-1 col-sm-1 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--{{$order_details}}--}}
                        @foreach($order_details as $item)
                            <tr id="row-item-{{$item->product->id}}" class="row col-md-12 col-sm-12 col-lg-12">
                                <td class="col-xsm-1" style="width: 3%">
                                    <input type="checkbox">
                                </td>
                                <td class="col-xs-1 text-center">{{$item->product->id}}</td>
                                <td class="col-xs-2">{{$item->product->name}}</td>
                                <td class="col-xs-2 "><img src="{{$item->product->images}}" class="card"
                                                           style="background-size: cover; width: 80px; height: 80px;">
                                </td>
                                <td class="col-xs-1 text-center">{{$item->quantity}}</td>
                                <td class="col-xs-2 text-center">
                                    {{$item->product->discount_price_string}}
                                    @if($item->product->original_price_string != $item->product->discount_price_string)
                                        <del class="text-danger">{{$item->product->original_price_string}}</del>
                                    @endif
                                </td>
                                <td class="col-md-2 col-xs-2 text-center">{{$item->unit_price * $item->quantity}}
                                    (vnd)
                                </td>
                                <td class="col-md-1 col-sm-1 text-center">
                                    <a href="javascript:void(0)"
                                       class="btn btn-link btn-delete btn-delete-product p-t-0" data-toggle="tooltip"
                                       title="Delete" data-placement="top"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="row col-md-12 col-sm-12 col-lg-12">
                            <td class="font-weight-bold col-xs-8 text-right" style="font-size: 16px">Total</td>
                            <td class="col-xs-4 text-center" style="font-size: 16px">{{$order->total_price}} (vnd)</td>
                        </tr>
                        </tbody>
                    </table>
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
