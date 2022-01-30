<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category= Category::all();
        return view('admin.category.index', compact('category'));

    }
    public function Add(){
        return view('admin.category.add');
    }
    public function insert(Request $req){
        $category=new Category();
        if($req->hasFile('image')){
            $file=$req->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/uploads/category',$filename);
            $category->image=$filename;
        }
        $category->name=$req->input('name');
        $category->slug=$req->input('slug');
        $category->discription=$req->input('discription');
        $category->status=$req->input('status')==TRUE ? '1':'0';
        $category->populer=$req->input('populer')==TRUE ? '1':'0';
        $category->meta_title=$req->input('meta_title');
        $category->meta_discription=$req->input('meta_discription');
        $category->meta_keywords=$req->input('meta_keywords');
        $category->save();
        return redirect('/dashboard')->with('status','Category Added Successfully');
    }
}
