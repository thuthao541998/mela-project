@extends("layouts.index")
@section('content')
@section('page-topic','CHECK OUT')
    <link rel="stylesheet" type="text/css" href="{{asset('css/order-success.css')}}">
    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 address">
                            <address style="font-size: 15px">
                                <strong>MELA COSMETICS</strong>
                                <br>
                                8th floor, 379 Hudson St
                                <br>
                                New York, NY 10018
                                <br>
                                <abbr title="Phone">P:</abbr>  (+1) 96 716 6879
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <h1>Receipt</h1>
                        </div>
                        <div class="information">
                            <p>You have checked out successfully.</p>
                            <p>Receiver : {{$order->ship_name}}</p>
                            <p>Address : {{$order->ship_address}}</p>
                            <p>Phone : {{$order->ship_phone}}</p>
                        </div>
                        </span>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_details as $item)
                                <tr>
                                    <td class="col-md-9 text-left"><em>{{$item->product->name}}</em></td>
                                    <td class="col-md-1 text-center">{{$item->quantity}}</td>
                                    <td class="col-md-1 text-center">{{$item->unit_price}}</td>
                                    <td class="col-md-1 text-center">{{$item->quantity * $item->unit_price}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong>{{$order->total_price}}</strong></h4></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="thank-you">Within 2 days, MELA will call to confirm your order.
                            Thank you for ordering at MELA.</div>
                    </div>
                </div>
            </div>

        {{--<div class="col-md-5">--}}
                {{--<div>You have checked out successfully</div>--}}
                {{--<div>Receiver : {{$order->ship_name}}</div>--}}
                {{--<div>Address : {{$order->ship_address}}</div>--}}
                {{--<div>Phone : {{$order->ship_phone}}</div>--}}
                {{--<div>Product--}}
                {{--@foreach($order_details as $item)--}}
                {{--<div>--}}
                {{--{{$item->product()->name}} : {{$item->product()->discountPrice}}--}}
                {{--</div>--}}
                {{--@endforeach--}}
                {{--<div>Total : {{$order->total_price}}</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                {{--Please look forward to receiving a call from us to confirm . Thank you very much!--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection