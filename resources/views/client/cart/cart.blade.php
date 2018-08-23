@extends("layouts.index")
@section('content')
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:300' rel='stylesheet' type='text/css'>
    <div style="background-color: white;">
        <div class="container">
            <div class="row" style="margin: 50px;">
                <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 20px;">
                    <h1 style="font-family: 'Lobster', cursive; text-align: center; font-size: 5em;">Shopping Cart</h1>
                </div>
            </div>
            </hr>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                        <tr style="font-family: 'Montserrat', sans-serif; text-transform: uppercase;">
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($list_obj as $obj)--}}
                            {{--<span class="hidden" {{$brand = $brands->find($obj->brandId)}}></span>--}}
                        <tr>
                            <td class="col-md-6">
                                <div class="media">
                                    <div class="card thumbnail pull-left"
                                         style="background-image: url('{{asset('/images/photo-gallery-thumb-12.jpg')}}{{--{{$obj->images}}--}}'); background-size: cover; width: 60px; height: 60px; margin-right: 20px;">
                                    </div>
                                    <div class="media-body" style="margin-left: 50px;">
                                        <h4 class="media-heading">{{--{{$obj->name}}--}}Product name</h4>
                                        {{--chuyển categoryId của product thành category--}}
                                        <h5 class="media-heading"> {{--{{$brand->name}}--}}Brand name</h5>
                                        {{--xử lí status của product từ số thành chữ--}}
                                        <span>Status: </span><span class="text-warning"><strong>{{--{{$obj->status}}--}}Leaves warehouse in 2 - 3 weeks</strong></span>
                                    </div>
                                </div></td>
                            <td class="col-md-1" style="text-align: center;">
                                <input type="number" class="form-control" id="exampleInputEmail1" value="2">
                                {{--lấy số lượng sản phẩm ở đây--}}
                                {{--{{$quantity = Input::get(quantity)}}--}}
                            </td>
                            <td class="col-md-1 text-center"><strong>{{--{{$unitPrice = $obj->discountPrice}}--}}$4.99</strong></td>
                            <td class="col-md-1 text-center"><strong>{{--{{$unitPrice*$quantity}}--}}$9.98</strong></td>
                            <td class="col-md-1">
                                {{--xoá sản phẩm ở đây--}}
                                <button type="button" class="btn btn-danger">
                                    <span class="fa fa-trash"></span> {{----}}Remove
                                </button></td>
                        </tr>
                        {{--@endforeach--}}
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Subtotal</h5></td>
                            {{--tổng tiền các sản phẩm ở đây--}}
                            <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Estimated shipping</h5></td>
                            {{--giá ship ở đây, kệ mẹ nó--}}
                            <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            {{--tổng tiền phải trả ở đây, giá ship + tổng tiền sản phẩm--}}
                            <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td>
                                <button type="button" class="btn btn-default">
                                    <span class="fa fa-shopping-cart"></span> Continue Shopping
                                </button></td>
                            <td>
                                {{--xử lí thanh toán ở đây--}}
                                <button type="button" class="btn btn-success">
                                    Checkout <span class="fa fa-play"></span>
                                </button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
