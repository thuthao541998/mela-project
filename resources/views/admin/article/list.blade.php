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
                        <table class="table" ui-jq="footable">
                            <thead>
                                <tr class="row">
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1">ID</th>
                                    <th class="col-md-1">Name</th>
                                    <th class="col-md-1">Author</th>
                                    <th class="col-md-2">Title</th>
                                    <th class="col-md-3 text-center">Content</th>
                                    <th class="col-md-1">Images</th>
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
                                    <td class="col-md-1">{{$item->name}}</td>
                                    <td class="col-md-1">{{$item->author}}</td>
                                    <td class="col-md-2">{{$item->title}}</td>
                                    <td class="col-md-3">{{$item->content}}</td>
                                    <td class="col-md-1">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                        </div>
                                    </td>
                                    <td class="col-md-3">
                                        <a href="#" class="btn btn-link btn-quick-edit">Quick Edit</a>&nbsp;&nbsp;
                                        <a href="/admin/article/{{$item -> id}}/edit" class="btn btn-link btn-edit">Edit</a>&nbsp;&nbsp;
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
                            <label class="col-lg-2 col-form-label">Author</label>
                            <input type="text" name="author" class="form-control w-75">
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label mr-0 pr-0">Content</label>
                            <textarea type="text" rows="10" name="content" class="form-control w-75"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-update-changes">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/quick-edit.js')}}"></script>
@endsection
