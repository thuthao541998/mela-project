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
                        @if($orders->count()>0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-3">Buyer</th>
                                <th class="col-md-2">Address</th>
                                <th class="col-md-2">Phone Number</th>
                                <th class="col-md-4">Order Detail</th>
                                <th class="col-md-3">Total</th>
                                <th class="col-md-1">Status</th>
                                <th class="col-md-3">Action</th>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1">{{$item->id}}</td>
                                    <td class="col-md-3">{{$item->ship_name}}</td>
                                    <td class="col-md-2">{{$item->ship_address}}</td>
                                    <td class="col-md-2">{{$item->ship_phone}}</td>
                                    <td class="col-md-4">
                                        @foreach($item->details as $order_detail)
                                            <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                                        @endforeach
                                    </td>
                                    <td class="col-md-3">{{$item->total}}</td>
                                    <td class="col-1">{{$item->statusLabel}}</td>
                                    <td class="col-3">
                                        @if($item->status==0)
                                            <a href="/admin/order/change-status?id={{$item->id}}&status=1" onclick="return confirm('Bạn có chắc muốn xác nhận đơn hàng?')"
                                               class="btn btn-simple btn-success btn-icon edit"><i
                                                        class="material-icons">how_to_reg</i></a>
                                        @elseif($item->status==1)
                                            <a href="/admin/order/change-status?id={{$item->id}}&status=2" onclick="return confirm('Bạn có chắc muốn hoàn thành đơn hàng?')"
                                               class="btn btn-simple btn-success btn-icon edit"><i
                                                        class="material-icons">done</i></a>
                                        @endif
                                        @if($item->status==0)
                                            <a href="{{$item->id}}" class="btn btn-simple btn-danger btn-icon remove btn-delete"><i
                                                        class="material-icons">close</i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-info">Havent't order in here.
                            </div>
                        @endif
                        <div class="pagination pull-right">
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection