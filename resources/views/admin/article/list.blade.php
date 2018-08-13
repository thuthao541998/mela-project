@extends('layouts.master')
@section('page-title', 'List Article - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <section id="main-content">
        <section class="wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Article
                    </div>
                    <div>
                        <table class="table table-hover">
                            <thead>
                                <tr class="row">
                                    <th class="col-md-1" style="width: 3%"></th>
                                    <th class="col-md-1"  style="width: 5%">ID</th>
                                    <th class="col-md-1">Title</th>
                                    <th class="col-md-1"  style="width: 10%">Author</th>
                                    <th class="col-md-3 text-center">Content</th>
                                    <th class="col-md-1">Images</th>
                                    <th class="col-md-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list_obj as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center" style="width: 3%">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1"  style="width: 5%">{{$item->id}}</td>
                                    <td class="col-md-1">{{$item->title}}</td>
                                    <td class="col-md-1" style="width: 10%">{{$item->author}}</td>
                                    <td class="col-md-3">{{$item->content}}</td>
                                    <td class="col-md-1">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                        </div>
                                    </td>
                                    <td class="col-md-3">
                                        <a href="#" class="btn btn-link btn-quick-edit"><span class="fa fa-eraser"></span>Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/article/{{$item -> id}}/edit" class="btn btn-link btn-edit"><span class="fa fa-edit"></span>Edit</a>&nbsp;&nbsp;
                                        <a href="#" id="{{$item-> id}}" class="btn btn-link btn-delete"><span class="fa fa-trash"></span>Delete</a>
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
                        <div class="pagination pull-right">
                            {!! $list_obj->links() !!}
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
