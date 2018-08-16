@extends('layouts.master')
@section('page-title', 'Edit Order - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit order
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
                                    <label class="control-label col-lg-2">ID</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="id" type="text" value="{{$obj->id}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Client</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="clientId" type="text" value="{{$obj->clientId}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Total</label>
                                    <div class="col-lg-9">
                                        <input class="form-control " name="total" type="number" value="{{$obj->total}}">
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