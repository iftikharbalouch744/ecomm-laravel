@extends('layouts.frontend')
@section('title')
    products
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h5 class="mb-0">
    Collections/{{$category->name}}
</h5>
</div>
</div>
<div class="container">

    <div class="row">
    @foreach($product as $items)
                <div class="col-md-4 mb-2">
                    <a href="{{url('category/'.$category->slug.'/'.$items->name)}}">
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
                    </a>
                </div>
            @endforeach
    </div>
</div>
