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
                    <div class="alert alert-success hidden mt-2 ml-2 mr-2" role="alert" id="messageSuccess"></div>
                    <div class="alert alert-danger hidden mt-2 ml-2 mr-2" role="alert" id="messageError"></div>
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
                            <div class="form-group mx-sm-4 mb-3">
                                <label for="chooseTime">Time</label>
                                <select id="select-action" name="categoryId" class="form-control">
                                    <option selected value="1">Today</option>
                                    <option selected value="2">Last Week</option>
                                    <option selected value="3">Last Month</option>
                                    <option selected value="4">Last 2 Months</option>
                                    <option selected value="5">All</option>
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
                                <tr class="row-item" id="row-item-{{$item->id}}">
                                    <td class="column-0">
                                        <input type="checkbox" class="check-item">
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

    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script>
        $('.filter-btn select[name=status]').change(function () {
            window.location.href = $('.filter-btn').attr('action') + '?status=' + $(this).val();
        });

        $('#check-all').click(function () {
            $('.check-item').prop('checked', $(this).is(':checked'));
        });

        $('#btn-apply-action').click(function () {
            var value = ($('select[name="select-action"]').val());
            var arrayId = [];
            $('.check-item:checked').each(function(index, item) {
                arrayId.push(parseInt(item.closest('.row-item').id.replace('row-item-', '')));
            });
            if(arrayId.length == 0){
                swal("Please choose at least 1 item!", {
                    icon: "warning",
                });
                return;
            }

            switch (value){
                case '-1':
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure to cancel these orders?",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willCancel) => {if (willCancel) {
                            $.ajax({
                                method: 'POST',
                                url: '/admin/order/update-status-many',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'ids': arrayId,
                                    'status': -1
                                },
                                success: function (resp) {
                                    for (var i = 0; i < arrayId.length; i++) {
                                        $('#row-item-' + arrayId[i]).remove();
                                    }
                                    if($('.check-item').length == 0){
                                        setTimeout(function(){
                                            window.location.reload(1);
                                        }, 2*500);
                                    }
                                },
                                error: function (r) {
                                    console.log(r);
                                    swal("Action fails! Please try again later!", {
                                        icon: "warning",
                                    });
                                }
                            });
                        }});
                    break;
                case '1':
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure to confirm these orders?",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willConfirm) => {if (willConfirm) {
                            $.ajax({
                                method: 'POST',
                                url: '/admin/order/update-status-many',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'ids': arrayId,
                                    'status': 1
                                },
                                success: function (resp) {
                                    for (var i = 0; i < arrayId.length; i++) {
                                        $('#row-item-' + arrayId[i]).remove();
                                    }
                                    if($('.check-item').length == 0){
                                        setTimeout(function(){
                                            window.location.reload(1);
                                        }, 2*500);
                                    }
                                },
                                error: function (r) {
                                    console.log(r);
                                    swal("Action fails! Please try again later!", {
                                        icon: "warning",
                                    });
                                }
                            });
                        }});
                    break;
                case '2':
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure to finish these orders?",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willCancel) => {if (willCancel) {
                            $.ajax({
                                method: 'POST',
                                url: '/admin/order/update-status-many',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'ids': arrayId,
                                    'status': 2
                                },
                                success: function (resp) {
                                    for (var i = 0; i < arrayId.length; i++) {
                                        $('#row-item-' + arrayId[i]).remove();
                                    }
                                    if($('.check-item').length == 0){
                                        setTimeout(function(){
                                            window.location.reload(1);
                                        }, 2*500);
                                    }
                                },
                                error: function (r) {
                                    console.log(r);
                                    swal("Action fails! Please try again later!", {
                                        icon: "warning",
                                    });
                                }
                            });
                        }});
                    break;
                default:
                    swal("Invalid action! Please try again!", {
                        icon: "warning",
                    });
                    break;
            }
        })
    </script>
@endsection