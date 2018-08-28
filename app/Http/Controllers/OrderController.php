<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function getChartDataApi()
    {
        $start_date = '2018-07-20';
        $end_date = '2018-08-30';
        $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
            ->whereBetween('created_at', array($start_date, $end_date))
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();
        return $chart_data;
    }

    public function changeStatus()
    {
        $id = Input::get('id');
        $status = Input::get('status');
        $order = Order::find($id);
        if ($order == null) {
            return view('errors.404');
        }
        $order->status = $status;
        $order->save();
        return redirect('/admin/order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.order.list')->with('orders_in_view', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            return view('404');
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
}
