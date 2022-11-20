<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order = Order::all();
        return view('admin/orders.index',compact('order'));
    }
    public function Status_Change(Request $request){
        $data = 1;
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->update();
        return $data;
    }
}
