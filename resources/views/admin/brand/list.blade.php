@extends('layouts.master')
@section('page-title', 'List Brand - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Brand
                    </div>
                    <div class="col-md-8 form-inline">
                        <div class="form-group mx-sm-4 mb-3">
                            <label for="chooseCategory">Brand</label>
                            <select id="select-action" class="form-control">
                                <option selected value="0">Brand</option>
                                <option value="1">Urban Decay</option>
                                <option value="2">NARS</option>
                                <option value="3">Kylie Cosmetics</option>
                                <option value="4">NYX</option>
                                <option value="5">Maybelline</option>
                                <option value="6">Stila</option>
                                <option value="7">MAC</option>
                                <option value="8">ColourPop</option>
                                <option value="9">Dior</option>
                                <option value="10">Anastasia Beverly Hills</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <table class="table table-striped" >
                            <thead>
                            <tr class="row">
                                <th class="col-md-1" style="width: 3%"></th>
                                <th class="col-md-1" style="width: 3%">ID</th>
                                <th class="col-md-1 text-center">Name</th>
                                <th class="col-md-4 text-center">Description</th>
                                <th class="col-md-2 text-center">Images</th>
                                <th class="col-md-3 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list_obj as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center" style="width: 3%">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1" style="width: 3%">{{$item->id}}</td>
                                    <td class="col-md-2 text-center">{{$item->name}}</td>
                                    <td class="col-md-3 text-justify">{{$item->description}}</td>
                                    <td class="col-md-2">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 120px; height: 80px;">
                                        </div>
                                    </td>
                                    <td class="col-md-3">
                                        <a href="#" class="btn btn-link btn-quick-edit"><span class="fa fa-eraser"></span> Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/brand/{{$item -> id}}/edit" class="btn btn-link btn-edit"><span class="fa fa-edit"></span> Edit</a>&nbsp;&nbsp;
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
                                    <button type="submit" class="btn btn-primary mb-2" id="btn-apply">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination pull-right">
                        {!! $list_obj->links() !!}
                    </div>
                </div>
        </section>
    </section>
    <script src="{{asset('js/delete.js')}}"></script>
@endsection
