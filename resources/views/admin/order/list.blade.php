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
                                    <th class="column-0"></th>
                                    <th class="column-1">ID</th>
                                    <th class="column-2">Buyer</th>
                                    <th class="column-3">Address</th>
                                    <th class="column-4">Phone Number</th>
                                    <th class="column-5">Order Detail</th>
                                    <th class="column-6">Total</th>
                                    <th class="column-7">Status</th>
                                    <th class="column-8 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr id="row-item-{{$item->id}}">
                                    <td class="column-0">
                                        <input type="checkbox">
                                    </td>
                                    <td class="column-1">{{$item->id}}</td>
                                    <td class="column-2">{{$item->ship_name}}</td>
                                    <td class="column-3">{{$item->ship_address}}</td>
                                    <td class="column-4">{{$item->ship_phone}}</td>
                                    <td class="column-5">
                                        @foreach($item->details as $order_detail)
                                            <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                                        @endforeach
                                    </td>
                                    <td class="column-6">{{$item->total_price}}</td>
                                    <td class="column-7 font-weight-bold">{{$item->statusLabel}}</td>
                                    <td class="column-8 text-center">
                                        @if($item->status==0)
                                            <a href="/admin/order/update-status/{{$item->id}}?status=1" onclick="return confirm('Are sure to confirm this order?')"
                                               class="btn btn-simple btn-info btn-icon edit" title="Click to have this order confirmed"><i class="fas fa-hourglass"></i></a>
                                            <a href="/admin/order/update-status/{{$item->id}}?status=-1" onclick="return confirm('Are sure to confirm this order?')"
                                               class="btn btn-simple btn-danger btn-icon edit" title="Click to cancel this order"><i class="fas fa-times"></i></a>
                                        @elseif($item->status==1)
                                            <a href="/admin/order/update-status/{{$item->id}}?status=2" onclick="return confirm('Are you sure to finish this order?')"
                                               class="btn btn-simple btn-success btn-icon edit" title="Click to have this order finished"><i class="fas fa-check"></i></a>
                                            <a href="/admin/order/update-status/{{$item->id}}?status=-1" onclick="return confirm('Are sure to cancel this order?')"
                                               class="btn btn-simple btn-danger btn-icon edit" title="Click to cancel this order"><i class="fas fa-times"></i></a>
                                        @elseif($item->status==2)
                                            <i class="fas fa-check 4x text-danger"></i>
                                        @elseif($item->status==-1)
                                            <i class="fas fa-times 4x text-danger"></i>
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