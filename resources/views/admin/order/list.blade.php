@extends('layouts.master')
@section('page-title', 'List Order - Admin Page')
@section('content')
    <link href="{{asset('css/list.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <section id="main-content">
        <section class="wrapper">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List Order
                    </div>
                    <div class="float-right mt-3">
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span><i class="fa fa-caret-down"></i>
                        </div>
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
                            {{--<div class="form-group mx-sm-4 mb-3">--}}
                                {{--<label for="chooseTime">Time</label>--}}
                                {{--<select id="select-action" name="categoryId" class="form-control">--}}
                                    {{--<option selected value="1">Today</option>--}}
                                    {{--<option selected value="2">Last Week</option>--}}
                                    {{--<option selected value="3">Last Month</option>--}}
                                    {{--<option selected value="4">Last 2 Months</option>--}}
                                    {{--<option selected value="5">All</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
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
                                        @if($item->status == 0)
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script>
        $('.filter-btn select[name=status]').change(function () {
            window.location.href = $('.filter-btn').attr('action') + '?status=' + $(this).val();
        });

        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);

            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('#reportrange').val('');
            });

            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                // console.log(picker.endDate.format('YYYY-MM-DD'));
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/api-get-data-to-time?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        var list_obj = resp.list_obj;
                        if(list_obj == 0){
                            swal('No data exists', 'Please choose another time range.', 'warning');
                            return;
                        };
                        var content = '';
                        console.log(resp);
                        for (var i in list_obj) {
                            content += '<tr id="row-item-' + list_obj[i].id + '">';
                                content += '<td class="column-0">';
                            content += '<input type="checkbox">';
                            content += '</td>';
                            content += '<td class="column-1">' + list_obj[i].id + '</td>';
                            content += '<td class="column-2">' + list_obj[i].ship_name + '</td>';
                            content += '<td class="column-3">' + list_obj[i].ship_address + '</td>';
                            content += '<td class="column-4">' + list_obj[i].ship_phone + '</td>';
                            content += '<td class="column-5">';
                            {{--@foreach($item->details as $order_detail)--}}
                            jQuery.each(list_obj[i].details, function(i, item) {
                                if (item.product_id != undefined){
                                    content += '<li>' + item.product_id + ' - ' + item.quantity + '</li>';
                                }
                            });
                            content += '</td>';
                            content += '<td class="column-6">' + list_obj[i].total_price + '</td>';
                            content += '<td class="column-7 font-weight-bold">' + list_obj[i].statusLabel + '</td>';
                            content += '<td class="column-8 text-center">';

                            if (list_obj[i].status == 0) {
                                content += '<a href="/admin/order/update-status/{{$item->id}}?status=1" onclick="return confirm("Are sure to confirm this order?")" class="btn btn-simple btn-info btn-icon edit" title="Click to have this order confirmed"><i class="fas fa-hourglass"></i></a>';
                            content += '<a href="/admin/order/update-status/{{$item->id}}?status=-1" onclick="return confirm("Are sure to confirm this order?")" class="btn btn-simple btn-danger btn-icon edit" title="Click to cancel this order"><i class="fas fa-times"></i></a>';
                            } else if (list_obj[i].status == 1) {
                                content += '<a href="/admin/order/update-status/{{$item->id}}?status=2" onclick="return confirm("Are you sure to finish this order?")" class="btn btn-simple btn-success btn-icon edit" title="Click to have this order finished"><i class="fas fa-check"></i></a>';
                                content += '<a href="/admin/order/update-status/{{$item->id}}?status=-1" onclick="return confirm("Are sure to cancel this order?)" class="btn btn-simple btn-danger btn-icon edit" title="Click to cancel this order"><i class="fas fa-times"></i></a>';
                            } else if (list_obj[i].status == 2) {
                                    content += '<i class="fas fa-check 4x text-danger"></i>';
                            } else if (list_obj[i].status == -1) {
                                content += '<i class="fas fa-times 4x text-danger"></i>';
                            }
                            content += '</td>';
                            content += '</tr>';
                        }
                        $('tbody').html(content);
                    },
                    error: function () {
                        swal('Action failed', 'Cannot retrieve data from API', 'error');
                    }
                });
            });
        });

    </script>
@endsection