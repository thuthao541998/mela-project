<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public function index()
    {
        $choosedStatus = Input::get('status'); // default all.
        if ((!Input::has('status') || $choosedStatus == 3)) {
            $choosedStatus = 3;
            $orders = Order::paginate(10);
        } else {
            $orders = Order::where(['status' => $choosedStatus])->paginate(10);
        }
        return view('admin.order.list')
            ->with('choosedStatus', $choosedStatus)
            ->with('orders', $orders)
            ->with('null', null);
    }


    public function getChartDataApi()
    {
        $start_date = Input::get('startDate');
        $end_date = Input::get('endDate');
        $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
//        ->whereRaw('id=2')
//        ->whereBetween('created_at', array($start_date .' 00:00:00', $end_date . ' 23:59:59'))
            ->whereRaw('created_at >= "' . $start_date . ' 00:00:00" AND created_at <= "' . $end_date . ' 23:59:59" AND status = 2')
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();

        return $chart_data;
    }

    public function show($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return view('admin.404.404');
        }
        return view('admin.order.detail')
            ->with('order', $order)
            ->with('order_details',$order->order_details);
    }

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

    public function getDataToTimeApi()
    {
        $start_date = Input::get('startDate');
        $end_date = Input::get('endDate');
        $orders = Order::select()
            ->whereBetween('orders.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
            ->get();
        foreach ($orders as $data) {
            $data->statusLabel = $data->getStatusLabelAttribute();
        }
        return response()->json(['list_obj' => $orders], 200);
    }

    public function updateStatusMany(Request $request)
    {
        DB::table('orders')->where('id', Input::get('ids'))->update(['status' => $request->get('status')]);
        return redirect()->back();
    }
}

