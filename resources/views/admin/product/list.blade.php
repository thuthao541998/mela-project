@extends('layouts.master')
@section('page-title', 'List Product - Admin Page')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Product
                    </div>
                    <div>
                        <table class="table" ui-jq="footable" ui-options='{
                            "paging": {
                              "enabled": true
                            },
                            "filtering": {
                              "enabled": true
                            },
                            "sorting": {
                              "enabled": true
                            }}'>
                            <thead>
                            <tr>
                                <th class="col-md-1"></th>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-1">Name</th>
                                <th class="col-md-1">Price</th>
                                <th class="col-md-1">Images</th>
                                <th class="col-md-1">Overview</th>
                                <th class="col-md-2">Description</th>
                                <th class="col-md-1">Category</th>
                                <th class="col-md-1">Brand</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_obj as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1">{{$item->id}}</td>
                                    <td class="col-md-1">{{$item->name}}</td>
                                    <td class="col-md-1">{{$item->price}}</td>
                                    <td class="col-md-1">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                        </div>
                                    </td>
                                    <td class="col-md-1">{{$item->overview}}</td>
                                    <td class="col-md-2">{{$item->description}}</td>
                                    <td class="col-md-1">{{$item->category}}</td>
                                    <td class="col-md-1">{{$item->brand}}</td>
                                    <td class="col-md-2">
                                        <a href="#" class="btn btn-link btn-quick-edit">Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/bakery/edit/{{$item -> id}}" class="btn btn-link btn-edit">Edit</a>&nbsp;&nbsp;
                                        <a href="#" id="{{$item-> id}}" class="btn btn-link btn-delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-8 form-inline">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="check-all">
                            <label class="form-check-label" for="defaultCheck1">Check All</label>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <select id="select-action" class="form-control">
                                <option selected value="0">Action</option>
                                <option value="1">Delete All</option>
                                <option value="2">Another Action</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" id="btn-apply">Submit</button>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
