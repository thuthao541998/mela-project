@extends("layouts.index")
@section('content')
@section('page-topic','CHECK OUT')
    <link rel="stylesheet" type="text/css" href="{{asset('css/order-success.css')}}">
    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="success text-center">SUCCESSFULLY</div>
                <div class="information">
                    <div>You have checked out successfully.</div>
                    <div>Receiver : {{$order->ship_name}}</div>
                    <div>Address : {{$order->ship_address}}</div>
                    <div>Phone : {{$order->ship_phone}}</div>
                    <div class="product-information">
                        <table border="1px">
                            <tr class="header" height="30px">
                                <th class="col-md-3 text-center">Product Name</th>
                                <th class="col-md-1 text-center">Quantity</th>
                                <th class="col-md-2 text-center">Price</th>
                            </tr>
                            @foreach($order_details as $item)
                                <tr>
                                    <td class="col-md-3" align="center">{{$item->product->name}}</td>
                                    <td class="col-md-1" align="center">{{$item->quantity}}</td>
                                    <td class="col-md-2" align="center">{{$item->unit_price}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="total">TOTAL: {{$order->total_price}} </div>
                    </div>
                </div>
                <div class="thank-you">Within 2 days, MELA will call to confirm your order.
                    Thank you for ordering at MELA.</div>
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