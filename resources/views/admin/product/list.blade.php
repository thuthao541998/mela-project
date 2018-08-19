@extends('layouts.master')
@section('page-title', 'List Product - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/readMore.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Product
                </div>
                <div class="alert alert-success hidden mt-2" role="alert" id="messageSuccess"></div>
                <div class="alert alert-danger hidden mt-2" role="alert" id="messageError"></div>
                <div>
                    <div class="col-md-8 form-inline">
                        <div class="form-group mx-sm-4 mb-3">
                            <label for="chooseCategory">Category</label>
                            <select id="select-action" class="form-control">
                                <option selected value="0">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mx-sm-4 mb-3">
                            <label for="chooseCategory">Brand</label>
                            <select id="select-action" class="form-control">
                                <option selected value="0">All</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-light pl-4 float-lg-none">
                        <thead>
                        <tr class="row col-md-12 col-sm-12 col-lg-12">
                            <th class="col-xsm-1" style="width: 3%"></th>
                            <th class="col-xsm-1 ">ID</th>
                            <th class="col-md-1 col-sm-1  text-center" style="width: 5%">Name</th>
                            <th class="col-md-1 col-sm-1">Price</th>
                            <th class="col-md-1 col-sm-1 ">Images</th>
                            <th class="col-md-2 col-sm-2">Overview</th>
                            <th class="col-md-3 col-sm-3 ">Description</th>
                            <th class="col-md-1 col-sm-1" style="width: 3%">Category</th>
                            <th class="col-md-1 col-sm-1 text-center" style="width: 3%">Brand</th>
                            <th class="col-md-1 col-sm-1 text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_obj as $item)
                            <span class="hidden" {{$brand = $brands->find($item->brandId)}}></span>
                            <span class="hidden" {{$category = $categories->find($item->categoryId)}}></span>
                            <tr class="row col-lg-12 col-md-12 col-sm-12" id="row-item-{{$item->id}}">
                                <td class="col-xsm-1 text-center" style="width: 3%">
                                    <input type="checkbox" class="check-item">
                                </td>
                                <td class="col-xsm-1">{{$item->id}}</td>
                                <td class="col-md-1 col-sm-1" style="width: 5%">{{$item->name}}</td>
                                <td class="col-md-1 col-sm-1">{{$item->price}}</td>
                                <td class="col-md-1 col-sm-1">
                                    <div class="card"
                                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                    </div>
                                </td>
                                <td class="col-md-2 col-sm-2">
                                        {{$item->overview}}
                                </td>
                                <td class="col-md-3 col-sm-2 text-justify">
                                    <div class="comment more">
                                        {{$item->description}}
                                    </div>
                                </td>
                                <td class="col-md-1 col-sm-1 text-center">{{$category->name}}</td>
                                <td class="col-md-1 col-sm-1 text-center">{{$brand->name}}</td>
                                <td class="col-md-1 col-sm-1 text-center ">
                                    <a href="#" class="btn btn-link btn-quick-edit btn-quick-edit-product" data-toggle="tooltip" title="Quick Edit" data-placement="top"><span class="fa fa-eraser"></span></a>
                                    <a href="/admin/product/{{$item -> id}}/edit" class="btn btn-link btn-edit" data-toggle="tooltip" title="Edit" data-placement="top"><span class="fa fa-edit"></span></a>
                                    <a href="javascript:void(0)" id="{{$item-> id}}" class="btn btn-link btn-delete btn-delete-product" data-toggle="tooltip" title="Delete" data-placement="top"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 form-inline">
                            <div class="form-check ml-2">
                                <input class="form-check-input" type="checkbox" value="" id="check-all">
                                <select id="select-action" class="form-control">
                                    <option selected value="0">Action</option>
                                    <option value="1">Delete All</option>
                                    <option value="2">Another Action</option>
                                </select>
                                <button type="submit" class="btn btn-primary mb-2" id="btn-apply-product">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="pagination pull-right">
                        {!! $list_obj->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </section>

    {{--Modal--}}
    <div class="modal" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Quick Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" name="quick-edit-form">
                        <input type="hidden" name="id">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Name</label>
                            <input type="text" name="name" class="form-control w-75">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label mr-0 pr-0">Price</label>
                            <input type="number" name="price" class="form-control w-75">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label ml-0 pl-0">Overview</label>
                            <textarea type="text" rows="8" name="overview" class="form-control w-75"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-update-changes-product">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/quick-edit.js')}}"></script>
    <script src="{{asset('js/delete.js')}}"></script>
    <script src="{{asset('js/checkAll.js')}}"></script>
    <script src="{{asset('js/readMore.js')}}"></script>
@endsection
