@extends('layouts.frontend')
@section('title')
    Categories
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="container">
    <h2>Trending Categories</h2>
    <div class="row">
    @foreach($category as $items)
                <div class="col-md-3 mb-3">
                    <a href="{{url('/view-products/'.$items->slug)}}">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('assets/uploads/category/'.$items->image)}}" style="width:200px; height:250px;" alt="image">
                            <h3>{{$items->name}}</h3>
                        </div>
                        <div class="card-footer">
                            <p>
                            {{$items->discription}}
                            </p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
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

