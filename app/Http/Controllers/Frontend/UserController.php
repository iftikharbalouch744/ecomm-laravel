<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $orders=Order::where('user_id', Auth::id())->get();
        return view('frontend.order.index', compact('orders'));
    }
    public function view($id){
        $orders=Order::where('id',$id)->where('user_id', Auth::id())->first();
        // echo "<pre>";
        // print_r($orders); exit;
        return view('frontend.order.detail', compact('orders'));
    }
}
