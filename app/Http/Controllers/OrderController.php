<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choosedStatus = Input::get('status'); // default all.
        $product_id = Input::get('product_id');
        if((!Input::has('status') || $choosedStatus== 3)){
            $choosedStatus = 3;
            $orders = Order::paginate(10);
        } else {
            $orders = Order::where(['status' => $choosedStatus])->paginate(10);
        }
        foreach ($orders as $key=>$item)
            foreach ($item->details() as $product)
                if ($product->product->id != $product_id){
                    unset($orders[$key]);
                    return $orders;
//                    $orders->forget($key);
//                    $orders = $orders->pull($key);
//                    unset($orders[$i]);
            }

        return view('admin.order.list')
            ->with('choosedStatus', $choosedStatus)
            ->with('orders', $orders)
            ->with('product_id', $product_id)
            ->with('null', null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getChartDataApi()
{
    $start_date = Input::get('startDate');
    $end_date = Input::get('endDate');
    $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
        ->whereBetween('created_at', array($start_date .' 00:00:00', $end_date . ' 23:59:59'))
        ->groupBy('day')
        ->orderBy('day', 'desc')
        ->get();
    return $chart_data;
}

    public function create()
    {
        $order = new Order();
        $action = '/admin/order/create';
        return view('admin.order.form')
            ->with('admin', $order)
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
        $order = new Order();
        $order->total = Input::get('total');
        $order->clientId = Input::get('clientId');
        $order->save();
        return redirect('/admin/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return view('404');
        }
        return view('admin.order.list')
            ->with('admin', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return view('404');
        }
        return view('admin.order.edit')
            ->with('admin', $order);
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
        $order = Order::find($id);
        if ($order == null) {
            return view('admin.404.404');
        }
        $order->total = Input::get('total');
        $order->clientId = Input::get('clientId');
        $order->save();
        return redirect('/admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return view('404');
        }
        $order->delete();
        return redirect('/admin/order');
    }



    public function showJson($id)
    {
        $obj = Order::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $obj], 200);
    }

    public function quickUpdate(Request $request, $id)
    {
        $obj = Order::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->clientId = Input::get('clientId');
        $obj->total = Input::get('total');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
    public function updateStatus($id)
    {
        $obj = Order::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->status = Input::get('status');
        $obj->save();
        return redirect()->back();
    }

    public function updateStatusMany(Request $request)
    {
        DB::table('orders')->where('id', Input::get('ids'))->update(['status' => $request->get('status')]);
        return redirect()->back();
    }
}
