@extends('layouts.master')
@section('page-title', 'Edit Order Detail - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="heading">Edit order detail</div>
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal" method="get" action="" novalidate="novalidate">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Product</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="name" type="text" value="{{$obj->productId}}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Order</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="client" value="{{$obj->orderId}}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Quantity</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="total" type="text" value="{{$obj->quantity}}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Unit price</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="total" type="text" value="{{$obj->unitPrice}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection