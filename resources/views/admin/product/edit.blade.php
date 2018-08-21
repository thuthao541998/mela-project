@extends('layouts.master')
@section('page-title', 'Edit Product - Admin Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit product
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
                        <form id="create-form-edit" class="cmxform form-horizontal" method="post" action="/admin/product/{{$obj->id}}" novalidate="novalidate"  enctype="multipart/form-data">
                            @method('PUT')
                            {{csrf_field()}}
                            <div class="col-lg-7">
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Name</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="name" type="text" value="{{$obj->name}}">
                                        @foreach ($errors->get('name') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Category</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="categoryId" value="{{$obj->categoryId}}">
                                            <option value="0">All</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Brand</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="brandId" value="{{$obj->brandId}}">
                                            <option value="0">All</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$brand->id==$choosedBrandId?'selected':''}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Price</label>
                                    <div class="col-lg-9">
                                        <input class=" form-control" name="price" type="text" value="{{$obj->price}}">
                                        @foreach ($errors->get('price') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Overview</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="5" name="overview" type="text">{{$obj->overview}}</textarea>
                                        @foreach ($errors->get('overview') as $title)
                                            <p class="text-danger help-block">{{$title}}</p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label col-lg-2">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" rows="10" name="description" type="text">{{$obj->description}}</textarea>
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
                                        <input type="file" class="custom-file-input" name="images" id="img" value="{{$obj->images}}">
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