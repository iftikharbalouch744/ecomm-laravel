<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
   public function index(){
       $feature_images= Product::where('trending','1')->take(15)->get();
       $trending_categories= Category::where('populer','1')->take(15)->get();
       return view('frontend.index', compact('feature_images','trending_categories'));
   }
   public function category(){
       $category=Category::where('status','0')->get();
        return view('frontend.category', compact('category'));
   }
   public function view_products($slug){
       if(Category::where('slug',$slug)->exists()){
           $category=Category::where('slug',$slug)->first();
           $product=Product::where('cate_id', $category->id)->where('status','0')->get();
           return view('frontend.products.index', compact('category','product'));
       }
       else{
           return redirect('/')->with('status','Slug does not exist');
       }
   }
   public function product_details($cate_slug, $pro_slug){
    if(Category::where('slug',$cate_slug)->exists()){
        if(Product::where('name',$pro_slug)->exists()){
            $products=Product::where('name',$pro_slug)->first();
            $category=Category::where('slug',$cate_slug)->first();
       return view('frontend.products.detail', compact('products','category'));
        }
        else{
            return redirect('/')->with('status','Link Broken');
        }
    }
    else{
        return redirect('/')->with('status','Slug does not exist');
    }
   }
}
