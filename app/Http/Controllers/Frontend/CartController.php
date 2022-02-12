<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;



class CartController extends Controller
{
    public function index(Request $req){
        $prod_id=$req->input('prod_id');
        $prod_qty=$req->input('prod_qty');

        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->first();
            if($prod_check){
                if(count(Cart::where(['prod_id' => $prod_id, 'user_id' => Auth::id()])->get())>0){
                    return response()->json(['status'=>$prod_check->name." already added"]);
                    }
                    else
                    {
                        $cart_item= new Cart();
                        $cart_item->prod_id=$prod_id;
                        $cart_item->prod_qty=$prod_qty;
                        $cart_item->user_id=Auth::id();
                        $cart_item->save();
                        return response()->json(['status'=>$prod_check->name."has been added"]);
                    }
                }
        }
        else
        {
            return response()->json(['status'=>"Login for Add to Cart"]);
        }
    }
    public function cartview(){
        $cartitems=Cart::where('user_id',Auth::id())->get();

        return view('frontend.cartview',compact('cartitems'));

    }
    public function delcartitem(Request $req){
        if(Auth::check()){
         $prod_id=$req->input('prod_id');
            if(Cart::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->exists()){
                $record=Cart::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->first();
                $record->delete();
                return response()->json(['status'=>"Item deleted Successfully"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login for Delete to Cart"]);
        }

    }
    public function update_cart_qty(Request $req){
        if(Auth::check()){
         $prod_id=$req->input('prod_id');
         $prod_qty=$req->input('prod_qty');
            if(Cart::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->exists()){
                $record=Cart::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->first();
                $record->prod_qty=$prod_qty;
                $record->update();
                return response()->json(['status'=>"Item quantity Successfully"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Login for Delete to Cart"]);
        }

    }
}
