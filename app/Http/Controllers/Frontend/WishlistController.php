<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist=Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }
    public function addtowishlist(Request $request){
        $prod_id=$request->input('prod_id');
        if(Auth::check()){
            $prod_check=Product::where('id',$prod_id)->first();
            if($prod_check){
                if(count(Wishlist::where(['prod_id' => $prod_id, 'user_id' => Auth::id()])->get()) > 0){
                    return response()->json(['status'=>$prod_check->name." already added"]);
                    }
                    else
                    {
                        $wishlist_item= new Wishlist();
                        $wishlist_item->prod_id=$prod_id;
                        $wishlist_item->user_id=Auth::id();
                        $wishlist_item->save();
                        return response()->json(['status'=>$prod_check->name."has been added"]);
                    }
                }
        }
        else
        {
            return response()->json(['status'=>"Login for Add to Wishlist"]);
        }
    }
    public function delete_wishlist_item(Request $request){
        if(Auth::check()){
            $prod_id=$request->input('prod_id');
               if(Wishlist::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->exists()){
                   $record=Wishlist::where(['prod_id'=>$prod_id, 'user_id'=>Auth::id()])->first();
                   $record->delete();
                   return response()->json(['status'=>"Item deleted Successfully"]);
               }
           }
           else
           {
               return response()->json(['status'=>"Login for Delete to wishlist"]);
           }
    }
    public function count_wishlist(){
        $count=Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$count]);
    }
}
