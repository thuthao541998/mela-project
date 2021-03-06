@extends('layouts.master')
@section('page-title', 'Create Category - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Create new category
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <label style="font-size: 15px">Please refill the form.</label>
                        </div>
                    @endif
                    <div class="form">
                        <form id="create-form" class="cmxform form-horizontal" method="post" action="/admin/category" novalidate="novalidate"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-7">
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Name</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="name" type="text">
                                        @foreach ($errors->get('name') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="10" name="description" type="text"></textarea>
                                        @foreach ($errors->get('description') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="custom-file">
                                    <label class="control-label col-lg-3">Images</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="custom-file-input" name="images" id="img">
                                        <label class="custom-file-label text-truncate" for="img">Choose file</label>
                                        @foreach ($errors->get('images') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
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