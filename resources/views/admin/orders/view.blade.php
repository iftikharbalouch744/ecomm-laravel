@extends('layouts.admin')
@section('content')
<h2>Your placed Order Items</h2>
<hr/>
<div class="tile">
<div class="tile-body">
<div class="row">
    <div class="col-md-6">
        <lable>Name:</lable>
        <div class="border p-2">{{$orders->F_Name}} {{$orders->L_Name}}</div>

        <lable>Email:</lable>
        <div class="border p-2"> {{$orders->Email}}</div>
        <lable>Contact:</lable>
        <div class="border p-2"> {{$orders->Phone}}</div>
        <lable>Shipping Address:</lable>
        <div class="border p-2"> {{$orders->address1}} , {{$orders->address1}}</div>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1; ?>
        @foreach($orders->orderItems as $item)
        <tr>
        <th scope="row">{{$count++}}</th>
        <td><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:50px; height:50px;" alt="image"></td>
        <td>{{$item->products->name}}</td>
        <td>{{$item->prod_qty}}</td>
        <td>{{$item->prod_price}}</td>
        <td>{{$item->prod_sub_total}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    <h4 class="px-2">Grand Total: <span class="float-end">RS {{$orders->order_amount}}/-</span></h4>
    <form action="{{url('update/'.$orders->id)}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-6">
        <select name="status" class="form-control">
        <option value="0" {{$orders->status==0 ? 'selected':''}} >Panding</option>
        <option value="1" {{$orders->status==1 ? 'selected':''}} >Completed</option>
    </select>
        </div>
        <div class="col-md-6">
        <input type="submit" class="btn btn-primary" value="Status Update"/>
        </div>
    </div>
    </form>
       </div>
    </div>
</div>
</div>
@endsection
