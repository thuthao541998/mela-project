@extends('layouts.master')
@section('page-title', 'Create Article - Admin Page')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create new product
                    <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
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
                                <label class="control-label col-lg-3">Author</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="author" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Title</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="title" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Content</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="content" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Images</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="images">
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