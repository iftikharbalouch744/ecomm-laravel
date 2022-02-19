@extends('layouts.frontend')
@section('title')
    Wishlist View
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h6 class="mb-0">
Wishlist Items
</h6>
</div>
</div>
<div class="container">
    @if($wishlist->count() == 0)
    <div class="row">
         <div class="card">
            <div class="card-body">
                <h2>Wishlist is Empty</h2>
                <a href="{{ url('categories') }}" class="btn btn-outline-primary checkoutcart me-3 float-end">Click here go to Shoping</a>
            </div>
        </div>
    </div>
    @else
    <div class="row">
         <div class="card">
            <div class="card-body">
            @foreach($wishlist as $item)
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
                    @if($item->products->qty >=  $item->prod_qty)
                    <div class="input-group text-center mb-3">
                           <button class="input-group-text decrement-btn">-</button>
                            <input type="text" value='1' class="form-control qty-input">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    @else
                        <h3>Out of Stock</h3>
                    @endif
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-outline-primary btn-sm add-to-cart addtocart" value="Add to Cart" href="{{$item->prod_id}}">Add to Cart</a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-outline-warning btn-sm delete-wishlist">Remove</button>
                    </div>
                </div>
                <hr/>
            @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

