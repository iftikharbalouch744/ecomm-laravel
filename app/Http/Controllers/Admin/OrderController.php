<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
       // $orders=Order::where('status','0')->get();
       $orders=Order::all();
        return view('admin.orders.index', compact('orders'));
    }
    public function view_orders($id){
        $orders=Order::where('id',$id)->first();
        return view('admin.orders.view', compact('orders'));
    }
    public function update_order(Request $request, $id){
        $order=Order::find($id);
        $order->status=$request->input('status');
        $order->update();
        return redirect('orders')->with('status','Order updated successfull..');
    }
}
