@extends('layouts.master')
@section('page-title', 'List Product - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Product
                </div>
                <div>
                    <div class="col-md-8 form-inline">
                        <div class="form-group mx-sm-4 mb-3">
                            <label for="chooseCategory">Category</label>
                            <select id="select-action" class="form-control">
                                <option selected value="0">Category</option>
                                <option value="1">Lipstick</option>
                                <option value="2">Lip Gloss</option>
                                <option value="3">Lip Liner</option>
                                <option value="4">Lip Stain</option>
                                <option value="5">Lip Balm</option>
                            </select>
                        </div>
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
                </div>
                <div>
                    <table class="table">
                        <thead>
                        <tr class="row">
                            <th class="col-md-1"></th>
                            <th class="col-md-1">ID</th>
                            <th class="col-md-1 text-center">Name</th>
                            <th class="col-md-1">Price</th>
                            <th class="col-md-1">Images</th>
                            <th class="col-md-1">Overview</th>
                            <th class="col-md-3">Description</th>
                            <th class="col-md-1">Category</th>
                            <th class="col-md-1 text-center">Brand</th>
                            <th class="col-md-2 text-center">Action</th>
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
                                <td class="col-md-1 text-center">{{$item->price}}</td>
                                <td class="col-md-1">
                                    <div class="card"
                                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                    </div>
                                </td>
                                <td class="col-md-1">{{$item->overview}}</td>
                                <td class="col-md-3 text-justify">{{$item->description}}</td>
                                <td class="col-md-1 text-center">{{$item->categoryId}}</td>
                                <td class="col-md-1 text-center">{{$item->brandId}}</td>
                                <td class="col-md-2 text-center">
                                    <a href="#" class="btn btn-link btn-quick-edit" style="font-size: 10px">Quick Edit</a>&nbsp;&nbsp;
                                    <a href="/admin/article/{{$item -> id}}/edit" class="btn btn-link btn-edit" style="font-size: 10px">Edit</a>&nbsp;&nbsp;
                                    <a href="#" id="{{$item-> id}}" class="btn btn-link btn-delete" style="font-size: 10px">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
        </section>
    </section>
@endsection
