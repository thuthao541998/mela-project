@extends('layouts.master')
@section('page-title', 'Edit Article - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit article
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal" method="get" action="" novalidate="novalidate" enctype="multipart/form-data">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="col-lg-7">
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Name</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="name" type="text" value="{{$obj->name}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Author</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="author" type="text" value="{{$obj->author}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Title</label>
                                    <div class="col-lg-9">
                                        <input class="form-control " name="title" type="text" value="{{$obj->title}}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Content</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="10" name="content" type="text">{{$obj->content}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="custom-file">
                                    <label class="control-label col-lg-3">Images</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="custom-file-input" name="images" id="img">
                                        <label class="custom-file-label text-truncate" for="img">Choose file</label>
                                        <img class="mt-2 img-fluid mb-5" style="background-size: cover; width: 260px;" src="{{$obj->images}}">
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