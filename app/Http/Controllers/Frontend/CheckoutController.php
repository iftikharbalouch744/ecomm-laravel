<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitems;
use Illuminate\Support\Facades\Auth;
use DB;


class CheckoutController extends Controller
{
    public function index(){
        $order_status=0;
        $old_cartItems=Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $items){
           $qty= Product::where('id', $items->prod_id)->where('qty','>=', $items->products->qty)->exists();
            if($qty)
            {
                $cartItems=Cart::where('user_id', Auth::id())->get();
            }
            else{
                $removeitem=Cart::where('user_id', Auth::id())->where('prod_id', $items->prod_id)->first();
                // echo "<pre>";
                // print_r($removeitem); exit;
                $removeitem->delete();
                $cartItems=Cart::where('user_id', Auth::id())->get();
            }

        }
        $count = DB::table('orders')->where('user_id', Auth::id())->count();
        $count_int=(int) $count;
        if($count_int > 0){
            $user_id=Order::where('user_id', Auth::id())->first();
            if($user_id->user_id==Auth::id()){
                $user_data=Order::where('user_id', Auth::id())->first();
            }
            $cartItems=Cart::where('user_id', Auth::id())->get();
            return view('frontend.checkout', compact('cartItems','user_data','count_int'));
        }
        $cartItems=Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems','count_int','order_status'));
     }
     public function place_order(Request $request)
     {
         $order=new Order();
         $order->user_id=Auth::id();
         $order->F_Name=$request->input('f_name');
         $order->L_Name=$request->input('l_name');
         $order->Email=$request->input('email');
         $order->Phone=$request->input('phone');
         $order->address1=$request->input('address1');
         $order->address2=$request->input('address2');
         $order->city=$request->input('city');
         $order->state=$request->input('state');
         $order->country=$request->input('country');
         $order->pincode=$request->input('pincode');
         $order->payment_method=$request->input('payment_method');
         $order->payment_id=$request->input('payment_id');
         $order->message=$request->input('message');
         $order->tracking_no='order'.rand(1111,9999);
         $order->order_amount=$request->input('totalamount');
        //  echo "<pre>";
        //  print_r($order); exit;
         $order->save();
        $order_status=true;
            $cartItems=Cart::where('user_id', Auth::id())->get();
            foreach($cartItems as $items){
                orderitems::create([
                    'order_id'=>$order->id,
                    'prod_id'=>$items->prod_id,
                    'prod_qty'=>$items->prod_qty,
                    'prod_price'=>$items->products->original_price,
                    'prod_sub_total'=>$items->prod_qty*$items->products->original_price,
                ]);
            }
            Cart::destroy($cartItems);
            if($request->input('payment_method')=='Paid by Razorpay' || $request->input('payment_method')=='Paid by PayPal'){
                return response()->json(['status'=>'Your order done successfully..']);
            }
            return redirect('/')->with('status','Your order done successfully..');
    }
    public function count_orders(){
        $ordercount=Order::where('user_id',Auth::id())->count();
        //print_r( $ordercount); exit;
        return response()->json(['count'=>$ordercount]);
    }
    public function razorpaycheck(Request $request){
        $cartItems=Cart::where('user_id', Auth::id())->get();
        // echo "<pre>";
        // print_r($cartItems); exit;
        $total_price=0;
        foreach($cartItems as $item){
            $total_price+= $item->products->original_price * $item->prod_qty;
        }

        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $email=$request->input('email');
        $phone=$request->input('$phone');
        $city=$request->input('city');
        $state=$request->input('state');
        $country=$request->input('country');
        $address1=$request->input('address1');
        $address2=$request->input('address2');
        $pincode=$request->input('pincode');


        return response()->json([
                'firstname'=>$firstname,
                 'lastname'=>$lastname,
                 'email'=>$email,
                 'phone'=>$phone,
                 'city'=>$city,
                 'state'=>$state,
                 'country'=>$country,
                 'address1'=>$address1,
                 'address2'=>$address2,
                 'pincode'=>$pincode,
                 'total_price'=>$total_price
        ]);
    }
}
