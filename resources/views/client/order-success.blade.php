@extends("layouts.index")
@section('content')
@section('page-topic','CHECK OUT')
    <div class="about-section paddingTB60 gray-bg">
        <div class="row">
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
            <div class="infor">
                <h3>Your information</h3>
                <span>Name: {{$order->ship_name}}</span>
                <span>Address: {{$order->ship_address}}</span>
                <span>Phone:: {{$order->ship_phone}}</span>
                <table>
                    <tbody>
                        <tr class="table-head">
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        @foreach($order_details as $item)
                            <tr class="table-row-{{$item->order_id}}">
                                <td class="column-1">
                                    <div>{{$item->product()->name}}</div>
                                </td>
                                <td class="column-2">
                                    <div>{{$item->product->discountPrice}}</div>
                                </td>
                                <td class="column-3">
                                    <div>{{$item->unit_price}}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3>Total Price: {{$item->total_price}}</h3>
            </div>
            <h1 class="ml-5">SUCCESSFULLY</h1>
        </div>
    </div>
@endsection