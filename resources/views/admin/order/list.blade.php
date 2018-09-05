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
                        <div class="filter-btn form-inline" action="/admin/order" method="GET">
                            <div class="form-group mx-sm-4 mb-3">
                                <label for="chooseStatus">Status</label>
                                <select id="select-action" name="status" class="form-control">
                                    <option selected value="3" {{3==$choosedStatus?'selected':''}}>All</option>
                                    <option value="0" {{0==$choosedStatus?'selected':''}}>Confirming</option>
                                    <option value="1" {{1==$choosedStatus?'selected':''}}>Confirmed</option>
                                    <option value="2" {{2==$choosedStatus?'selected':''}}>Finished</option>
                                    <option value="-1" {{-1==$choosedStatus?'selected':''}}>Cancelled</option>
                                </select>
                            </div>
                        </div>
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
                            <div class="row">
                                <div class="col-md-8 form-inline">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input col-lg-2" type="checkbox" value="" id="check-all">
                                        <select id="select-action" class="form-control">
                                            <option selected value="0">Action</option>
                                            <option value="1">Confirm All</option>
                                            <option value="2">Finish Action</option>
                                            <option value="1">Cancel All</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary ml-2" id="btn-apply-brand">Submit</button>
                                    </div>
                                </div>
                            </div>
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

    <script>
        $('.filter-btn select[name=status]').change(function () {
            // alert($(this).val());
            // var status = parseInt($('.filter-btn select[name=status]').val());
            window.location.href = $('.filter-btn').attr('action') + '?status=' + $(this).val();
            // if (status == 'NaN') {
            //     window.location.href = $('.filter-btn').attr('action');
            //     return false;
            // } else {
            //     window.location.href = $('.filter-btn').attr('action') + '?status=' + status;
            // };
        });
    </script>
@endsection