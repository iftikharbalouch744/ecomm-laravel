@extends('layouts.frontend')
@section('title')
    Cart View
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h6 class="mb-0">
Cart Items list
</h6>
</div>
</div>
<div class="container">
    <div class="row">
         <div class="card">
            <div class="card-body">
                @php $total=0;
                     $check='false';
                @endphp
            @foreach($cartitems as $item)
            @php $check='true'; @endphp
                <div class="row form-data">
                    <div class="col-md-2 border-right">
                        <input type="hidden" class="from-control prod_id" value="{{$item->prod_id}}">
                     <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:70px; height:70px;" alt="image">
                    </div>
                    <div class="col-md-2">
                        <h6>{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-2">
                        <span>RS {{$item->products->original_price}} /-</span>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group text-center mb-3">
                           <!-- <button class="input-group-text decrement-btn">-</button>-->
                            <input type="number" value='{{$item->prod_qty}}' class="form-control qty-input changeqty">
                            <input type="hidden" value='' class="form-control hide-input">
                          <!--  <button class="input-group-text increment-btn">+</button>-->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-warning btn-sm delete-cart-item">Remove</button>
                    </div>
                </div>
                <hr/>
                @php if($check=='true')
                        $total+=$item->prod_qty * $item->products->original_price;
                        @endphp
                @endforeach
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success checkoutcart me-3 float-end">Click here to Checkout</a>
                    <lable>

                        Total Price:{{$total}}
                    </lable>
            </div>
    </div>
</div>

