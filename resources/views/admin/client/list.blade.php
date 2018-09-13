@extends('layouts.master')
@section('page-title', 'List Client - Admin Page')
@section('content')

    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <section id="main-content">
        <section class="wrapper">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Client
                </div>
                <div class="float-right mt-3">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span><i class="fa fa-caret-down"></i>
                    </div>
                </div>
                <div>

                    @if(isset($orders)  && ($orders -> count()) > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="column-0"></th>
                                <th class="column-1 text-center">ID</th>
                                <th class="column-2">Name</th>
                                <th class="column-3">Email</th>
                                <th class="column-4">Password</th>
                                <th class="column-8 text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($list_obj as $item)
                                <tr class="row-item" id="row-item-{{$item->id}}">
                                    <td class="column-0">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="column-1 text-center">
                                        <div>{{$item->id}}</div>
                                    </td>
                                    <td class="column-2">{{$item->name}}</td>
                                    <td class="column-3">{{$item->email}}</td>
                                    <td class="column-4">{{$item->password}}</td>
                                    <td class="column-8 text-center">
                                        <a href="javascript:void(0)" id="{{$item-> id}}"
                                           class="btn btn-link btn-delete btn-delete-client" data-toggle="tooltip"
                                           title="Delete" data-placement="top"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8 form-inline">
                                <div class="form-check mb-2">
                                    <input class="form-check-input col-lg-2" type="checkbox" value="" id="check-all">
                                    <select id="select-action" name="select-action" class="form-control">
                                        <option selected value="0">Action</option>
                                        <option value="1">Confirm All</option>
                                        <option value="2">Finish All</option>
                                        <option value="-1">Cancel All</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary ml-2" id="btn-apply-action">Submit</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">Have no order in this fields.
                        </div>
                    @endif
                    <div class="pagination pull-right">
                        {!! $orders->links() !!}
                    </div>
                </div>
            </div>
        </section>
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection