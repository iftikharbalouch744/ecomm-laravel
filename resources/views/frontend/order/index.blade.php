@extends('layouts.frontend')
@section('title')
    My Orders
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="container">
    <br/>
<h2>Your placed Orders</h2>
<hr/>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Tracking No.</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1; ?>
        @foreach($orders as $order)
        <tr>
        <th scope="row">{{$count++}}</th>
        <td>{{$order->tracking_no}}</td>
        <td>{{$order->order_amount}}</td>
        <td>{{$order->status == 0 ? 'Panding': 'Completed'}}</td>
        <td><a href="{{url('/my-orders/'.$order->id)}}" class="btn btn-outline-primary btn-sm">View details</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
