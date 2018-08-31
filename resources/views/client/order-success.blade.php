@extends("layouts.index")
@section('content')
@section('page-topic','CHECK OUT')

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
        <h1 class="ml-5">SUCCESSFULLY</h1>
    </div>
@endsection