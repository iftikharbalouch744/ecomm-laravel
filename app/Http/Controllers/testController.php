<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function sum(){
        return view('frontend.test');
    }
    public function save(Request $request){
        return $request->all();
    }
}
