@extends('layouts.frontend')
@section('title')
    products
@endsection
@include('frontend.inc.frontnave')
@section('content')
<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h5 class="mb-0">
    Collections/
</h5>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
        <div class="card">
        <div class="card-header">
        Basic Detials
        </div>
            <div class="card-body">
                <div class="row" class="checkout-form">
                    <div class="col-md-6">
                        <lable>First Name</lable>
                        <input type="text" name="f_name" class="form-control form-control-sm" palceholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <lable>Last Name</lable>
                        <input type="text" name="l_name" class="form-control form-control-sm" palceholder="Last Name">
                    </div>
                    <div class="col-md-6">
                        <lable>Email</lable>
                        <input type="email" name="email" class="form-control form-control-sm" palceholder="Enater Email">
                    </div>
                    <div class="col-md-6">
                        <lable>Phone No.</lable>
                        <input type="text" name="phone" class="form-control form-control-sm" palceholder="Enter Phone No.">
                    </div>
                    <div class="col-md-6">
                        <lable>Adrress 1</lable>
                        <input type="text" name="address1" class="form-control form-control-sm" palceholder="Enter Address">
                    </div>
                    <div class="col-md-6">
                        <lable>Address 2</lable>
                        <input type="text" name="address2" class="form-control form-control-sm" palceholder="Enter Address">
                    </div>
                    <div class="col-md-6">
                        <lable>City</lable>
                        <input type="text" name="city" class="form-control form-control-sm" palceholder="Entry City">
                    </div>
                    <div class="col-md-6">
                        <lable>State</lable>
                        <input type="text" name="state" class="form-control form-control-sm" palceholder="Enter State">
                    </div>
                    <div class="col-md-6">
                        <lable>Country</lable>
                        <input type="text" name="county" class="form-control form-control-sm" palceholder="Enter Country">
                    </div>
                    <div class="col-md-6">
                        <lable>Pin Code</lable>
                        <input type="text" name="pincode" class="form-control form-control-sm" palceholder="Pin Code">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-5">
        <div class="card">
            <div class="card-header">
            Order Detials
            </div>
            <div class="card-body">
            <table class="table table-striped">
  <thead>
    <tr>

      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Sub Price</th>
    </tr>
  </thead>
  <tbody>

  @foreach($cartItems as $item)
    <tr>
      <td><img src="{{asset('assets/uploads/product/'.$item->products->image)}}" style="width:50px; height:50px;" alt="image">
      </td>
      <td>{{$item->products->name}}</td>
      <td>{{$item->prod_qty}}</td>
      <td>{{$item->products->original_price}}</td>
      <td>{{$item->prod_qty*$item->products->original_price}}</td>
    </tr>

    @endforeach
    <tr>
        <td colspan="6">
            Total: {{}}
        </td>
    </tr>

  </tbody>

</table>
<button class="btn btn-outline-success btn-sm float-end">Palce Order</button>

            </div>
            </div>
        </div>

</div>
</div>
