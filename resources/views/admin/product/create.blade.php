@extends('layouts.master')
@section('page-title', 'Create Product - Admin Page')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="heading">Create new product</div>
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
                            <div>
                                <label>Category</label>
                                <div class="col-lg-6">
                                    <select name="categoryId">
                                        <option value="0">All</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label>Brand</label>
                                <div class="col-lg-6">
                                    <select name="brandId">
                                        <option value="0">All</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{$brand->id==$choosedBrandId?'selected':''}}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Price</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" name="price" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Images</label>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" name="images">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Overview</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="overview" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-3">Description</label>
                                <div class="col-lg-6">
                                    <input class="form-control " name="description" type="text">
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