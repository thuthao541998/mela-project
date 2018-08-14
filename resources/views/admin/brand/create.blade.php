@extends('layouts.master')
@section('page-title', 'Create Article - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Create new brand
                    <span class="tools pull-right">
                        <a href="javascript:;">
                            <span class="fa fa-chevron-down"></span>
                        </a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal" method="post" action="/admin/brand" novalidate="novalidate" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Name</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="10" name="description" type="text"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="custom-file">
                                    <label class="control-label col-lg-3">Images</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="custom-file-input" name="images" id="img">
                                        <label class="custom-file-label text-truncate" for="img">Choose file</label>
                                    </div>
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
    <script src="{{asset('js/form.js')}}"></script>
@endsection