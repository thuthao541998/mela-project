@extends('layouts.master')
@section('page-title', 'List Category - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Category
                    </div>
                    <div class="alert alert-success hidden mt-2" role="alert" id="messageSuccess"></div>
                    <div class="alert alert-danger hidden mt-2" role="alert" id="messageError"></div>
                    <div class="col-md-8 form-inline">
                        <div class="form-group mx-sm-4 mb-3">
                            <label for="chooseCategory">Category</label>
                            <select id="select-action1" class="form-control">
                                <option selected value="0">Category</option>
                                <option value="1">Lipstick</option>
                                <option value="2">Lip Gloss</option>
                                <option value="3">Lip Liner</option>
                                <option value="4">Lip Stain</option>
                                <option value="5">Lip Balm</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr class="row">
                                <th class="col-md-1" style="width: 3%"></th>
                                <th class="col-md-1" style="width: 3%">ID</th>
                                <th class="col-md-2">Name</th>
                                <th class="col-md-1">Images</th>
                                <th class="col-md-4 text-center">Description</th>
                                <th class="col-md-3 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_obj as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1">{{$item->id}}</td>
                                    <td class="col-md-2">{{$item->name}}</td>
                                    <td class="col-md-1">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                        </div>
                                    </td>
                                    <td class="col-md-4">{{$item->description}}</td>
                                    <td class="col-md-3">
                                        <a href="#" class="btn btn-link btn-quick-edit"><span class="fa fa-eraser"></span> Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/category/{{$item -> id}}/edit" class="btn btn-link btn-edit"><span class="fa fa-edit"></span> Edit</a>&nbsp;&nbsp;
                                        <a href="javascript:void(0)" id="{{$item -> id}}" class="btn btn-link btn-delete"><span class="fa fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8 form-inline">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="check-all">
                                    <select id="select-action" class="form-control">
                                        <option selected value="0">Action</option>
                                        <option value="1">Delete All</option>
                                        <option value="2">Another Action</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mb-2" id="btn-apply-category">Submit</button>
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
    <script src="{{asset('js/delete.js')}}"></script>
    <script src="{{asset('js/checkAll.js')}}"></script>
@endsection
