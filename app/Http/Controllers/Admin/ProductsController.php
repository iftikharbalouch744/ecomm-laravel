<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('admin.products.products');
    }
    public function addproduct(){
        $category= Category::all();
        return view('admin.products.AddProducts',compact('category'));
    }
    public function insetproduct(Request $req){
        $product=new Product;
        if($req->hasFile('image')){
            $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/product',$filename);
            $product->image=$filename;
        }
        $product->cate_id=$req->input('categor_id');
        $product->name=$req->input('product_name');
        $product->small_description=$req->input('small_description');
        $product->description=$req->input('description');
        $product->original_price=$req->input('original_price');
        $product->selling_price=$req->input('selling_price');
        $product->qty=$req->input('qty');
        $product->tex=$req->input('tex');
        $product->status=$req->input('status')==TRUE ? '1':'0';
        $product->trending=$req->input('trending')==TRUE ? '1':'0';
        $product->meta_title=$req->input('meta_title');
        $product->meta_description=$req->input('meta_description');
        $product->meta_keywords=$req->input('meta_keywords');
        $product->save();
        return redirect('/dashboard')->with('status','Product Added Successfully');
    }
}
