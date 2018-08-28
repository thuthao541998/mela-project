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
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="column-1">ID</th>
                                <th class="column-2">Buyer</th>
                                <th class="column-3">Address</th>
                                <th class="column-4">Phone Number</th>
                                <th class="column-5">Order Detail</th>
                                <th class="column-6">Total</th>
                                <th class="column-7">Status</th>
                                <th class="column-8">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr id="row-item-{{$item->id}}">
                                    <td class="column-1">{{$item->id}}</td>
                                    <td class="column-2">{{$item->ship_name}}</td>
                                    <td class="column-3">{{$item->ship_address}}</td>
                                    <td class="column-4">{{$item->ship_phone}}</td>
                                    <td class="column-5">
                                        @foreach($item->details as $order_detail)
                                            <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                                        @endforeach
                                    </td>
                                    <td class="column-6">{{$item->total}}</td>
                                    <td class="column-7">{{$item->statusLabel}}</td>
                                    <td class="column-8">
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