<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderDetailController extends Controller
{

    public function show($id)
    {
        $order_detail = OrderDetail::find($id);
        if ($order_detail == null) {
            return view('404');
        }
//        return view của 1 order detail cụ thể chứ không phải list
        return view('admin.order_detail.list')
            ->with('admin', $order_detail);
    }

    public function update($id)
    {
        $id = Input::get('id');
        $order_detail = OrderDetail::find($id);
        if ($order_detail == null) {
            return view('404');
        }
        $order_detail = new OrderDetail();
        $order_detail->productId = Input::get('productId');
        $order_detail->quantity = Input::get('quantity');
        $order_detail->unitprice = Input::get('unitprice');
//        Xử lí reference orderId theo cách khác
        $order_detail->order_id = Input::get('order_id');
        $order_detail->save();
        return redirect('/admin/order_detail');
    }


    public function getPieChartDataApi()
    {
        //DB::connection()->enableQueryLog();
        $start_date = Input::get('startDate');
        $end_date = Input::get('endDate');
//        $chart_data = OrderDetail::select(DB::raw('sum(quantity) as totalQuantity'), DB::raw('product_id as product_id'))
//            ->whereRaw('created_at >= "'.$start_date.' 00:00:00" AND created_at <= "'.$end_date . ' 23:59:59"')
//            ->groupBy('product_id')
//            ->get();
        $orders = Order::whereRaw('status=2')->get();
        $id = $orders->pluck('id')->all();

        $chart_data = OrderDetail::select(DB::raw('sum(quantity) as totalQuantity'), 'product_id')
            ->whereRaw('created_at >= "'.$start_date.' 00:00:00" AND created_at <= "'.$end_date . ' 23:59:59"')
            ->whereIn('order_id',$id)
            ->groupBy('product_id')
            ->orderBy('totalQuantity', 'desc')
            ->get();
        return $chart_data;
    }
}
