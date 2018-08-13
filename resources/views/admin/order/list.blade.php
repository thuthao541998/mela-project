@extends('layouts.master')
@section('page-title', 'List Order - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Order
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1"></th>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-3">Client</th>
                                <th class="col-md-3">Total</th>
                                <th class="col-md-4">Action</th>
                            </thead>
                            <tbody>
                            @foreach($list_obj as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1">{{$item->id}}</td>
                                    <td class="col-md-3">{{$item->clientId}}</td>
                                    <td class="col-md-3">{{$item->total}}</td>
                                    <td class="col-md-4">
                                        <a href="#" class="btn btn-link btn-quick-edit"><span class="fa fa-eraser"></span> Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/order/{{$item -> id}}/edit" class="btn btn-link btn-edit"><span class="fa fa-edit"></span> Edit</a>&nbsp;&nbsp;
                                        <a href="#" id="{{$item-> id}}" class="btn btn-link btn-delete"><span class="fa fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
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
                </div>
        </section>
    </section>
@endsection