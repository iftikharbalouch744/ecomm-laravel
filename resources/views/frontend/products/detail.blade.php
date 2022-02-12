@extends('layouts.frontend')
@section('title')
    details
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h6 class="mb-0">
    Collections/{{$category->name}} / {{$products->name}}
</h6>
</div>
</div>
<div class="container">
    <div class="row">
                    <div class="card prod_data">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <img src="{{asset('assets/uploads/product/'.$products->image)}}" style="width:200px; height:250px;" alt="image">
                            </div>
                            <div class="col-md-8 border-left">
                                <h2>{{$products->name}}</h2>
                                @if($products->trending=='1')
                                <label style="margin-top: -30;" for="badge" class="badge bg-success float-end">Trending</label>
                                @endif

                                <hr/>
                                <p>
                                {{$products->small_description}} <br/>
                                <strong>
                                @if($products->qty > 0)
                               <label for="badge" class="badge bg-success">Instock</label>
                                @else
                                <label for="badge" class="badge bg-danger">Outstock</label>
                                @endif
                                </strong>
                                </p>
                                <div class="row mt-2 form-data">
                                    <div class="col-md-3">
                                        <input type="hidden" value="{{$products->id}}" class="prod_id">
                                        <lable for="Quantity">Quantity</lable>
                                        <div class="input-group text-center mb-3">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input width="200px" type="text" value='1' class="form-control qty-input">
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                </div>
                                <span class="fw-bold">Now Price: RS {{$products->original_price}} /-</span>
                                <span class="me-3">Old Price: RS <s>{{$products->selling_price}}</s></span>
                                <hr/>
                                @if($products->qty > 0)
                                <button class="btn btn-outline-primary me-3 float-start">Add to Wishlist <i class="fa fs-heart"></i></button>
                                <button class="btn btn-outline-success addtocart me-3 float-end">Add to Cart <i class="fa fs-cart"></i></button>
                                @else
                                <button class="btn btn-outline-primary me-3 float-end">Add to Wishlist <i class="fa fs-heart"></i></button>
                                @endif

                            </div>

                        </div>
                    </div>

                </div>
    </div>
</div>

