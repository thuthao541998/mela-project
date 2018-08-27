@extends('layouts.master')
@section('page-title', 'Edit Order Detail - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit order detail
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form id="create-form" class="cmxform form-horizontal" method="get" action="" novalidate="novalidate">
                            @method('PUT')
                            {{csrf_field()}}

                            <div class="col-lg-7">
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Product</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="productId" type="text" value="{{$obj->productId}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Author</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="author" type="text" value="{{$obj->orderId}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Quantity</label>
                                    <div class="col-lg-9">
                                        <input class="form-control " name="quantity" type="number" value="{{$obj->quantity}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Unit price</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="unitprice" type="number" value="{{$obj->unitprice}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5"></div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-default" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="{{asset('js/form.js')}}"></script>
@endsection