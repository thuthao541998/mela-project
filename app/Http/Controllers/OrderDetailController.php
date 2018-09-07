<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        Phải xử lí gộp các order detail chung một orderId vào và index ra
        $order_details = OrderDetail::paginate(10);
        return view('admin.order_detail.list')->with('$order_details_in_view', $order_details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order_detail = new OrderDetail();
        $action = '/admin/order_detail/create';
        return view('admin.order_detail.form')
            ->with('admin', $order_detail)
            ->with('action', $action);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $order_detail = new OrderDetail();
        $order_detail->productId = Input::get('productId');
        $order_detail->quantity = Input::get('quantity');
        $order_detail->unitprice = Input::get('unitprice');
//        Xử lí reference orderId theo cách khác
        $order_detail->orderId = Input::get('orderId');
        $order_detail->save();
        return redirect('/admin/order_detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order_detail = OrderDetail::find($id);
        if ($order_detail == null) {
            return view('404');
        }
        return view('admin.order_detail.edit')
            ->with('admin', $order_detail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $order_detail->orderId = Input::get('orderId');
        $order_detail->save();
        return redirect('/admin/order_detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        if ($order_detail == null) {
            return view('404');
        }
        $order_detail->delete();
//        Sửa tiếp redirect
        return redirect('/admin/order_detail');
    }
    public function getPieChartDataApi()
    {
        $start_date = Input::get('startDate');
        $end_date = Input::get('endDate');
        $chart_data = OrderDetail::selectRaw('sum(quantity) as `totalQuantity`, product_id as `product_id`')
            ->whereRaw('created_at >= "'.$start_date .' 00:00:00" AND created_at <= "'.$end_date . ' 23:59:59"')
            ->groupBy('product_id')
            ->get();
        return $chart_data;
    }
}
