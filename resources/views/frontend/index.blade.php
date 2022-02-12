@extends('layouts.frontend')
@section('title')
    E-Shop
@endsection
@include('frontend.inc.frontnave')
@include('frontend.inc.slider')
@section('content')
<div class="container">
    <h1>Welcome to E-Shopping</h1>
    <h2>Featured Products</h2>
    <div class="row">
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach($feature_images as $items)
                <div class="item">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('assets/uploads/product/'.$items->image)}}" style="width:200px; height:250px;" alt="image">
                            <h3>{{$items->name}}</h3>
                        </div>
                        <div class="card-footer">

                            <span class="float-start">Now Price: RS {{$items->original_price}} /-</span>
                            <span class="float-end">Old Price: RS <s>{{$items->selling_price}}</s></span>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <h2>Trending Categories</h2>
    <div class="row">
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach($trending_categories as $items)
                <div class="item">
                    <div class="card">
                    <a href="{{url('/view-products/'.$items->slug)}}">
                        <div class="card-body">
                            <img src="{{asset('assets/uploads/category/'.$items->image)}}" style="width:200px; height:250px;" alt="image">
                            <h3>{{$items->name}}</h3>
                        </div>
                    </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
 <script>
     $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
 </script>
@endsection

