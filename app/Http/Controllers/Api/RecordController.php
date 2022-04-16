<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class RecordController extends Controller
{
    public function list(){
        $trending_products= Product::where('trending','1')->take(15)->get();
        return response()->json($trending_products);
    }
}
