@extends('layouts.master')
@section('page-title', 'Create Order - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="heading">Create new order</div>
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal" method="get" action="" novalidate="novalidate">
                            {{csrf_field()}}
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Name</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Client</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="client">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Total</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="total" type="text">
                                </div>
                            </div>
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
@endsection