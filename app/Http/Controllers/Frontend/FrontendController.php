<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
   public function index(){
       $feature_images= Product::where('trending','1')->take(15)->get();
       return view('frontend.index', compact('feature_images'));
   }
}
