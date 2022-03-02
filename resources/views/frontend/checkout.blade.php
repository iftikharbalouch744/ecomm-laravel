@extends('layouts.frontend')
@section('title')
    products
@endsection
@include('frontend.inc.frontnave')
@section('content')

<?php
$total_amount=0;
?>
<style>
    span{
        color:red;
    }
</style>

<div class="py-3 mb-4 shadow-4sm bg-warning boarder-top">
    <div class="container">
<h5 class="mb-0">
    Collections/
</h5>
</div>
</div>
<div class="container">
<form id="checkout_form" action="{{url('place-order')}}" method="POST">
    @csrf
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
                        <input type="text" name="f_name" value="{{$count_int == '0' ? '' :$user_data->F_Name}}" class="form-control form-control-sm firstname" palceholder="First Name">
                        <span id="fname_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Last Name</lable>
                        <input type="text" name="l_name" value="{{$count_int == '0' ? '' :$user_data->L_Name}}" class="form-control form-control-sm lastname" palceholder="Last Name">
                        <span id="lname_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Email</lable>
                        <input type="email" name="email" value="{{$count_int == '0' ? '' : $user_data->Email}}" class="form-control form-control-sm email" palceholder="Enater Email">
                        <span id="email_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Phone No.</lable>
                        <input type="text" name="phone" value="{{$count_int == '0' ? '' :$user_data->Phone}}" class="form-control form-control-sm phone" palceholder="Enter Phone No.">
                        <span id="phone_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>City</lable>
                        <input type="text" name="city" value="{{$count_int == '0' ? '' :$user_data->city}}" class="form-control form-control-sm city" palceholder="Entry City">
                        <span id="city_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>State</lable>
                        <input type="text" name="state" value="{{$count_int == '0' ? '' :$user_data->state}}" class="form-control form-control-sm state" palceholder="Enter State">
                        <span id="state_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Country</lable>
                        <input type="text" name="country" value="{{$count_int == '0' ? '' :$user_data->country}}" class="form-control form-control-sm country" palceholder="Enter Country">
                        <span id="country_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Pin Code</lable>
                        <input type="text" name="pincode" value="{{$count_int == '0' ? '' :$user_data->pincode}}" class="form-control form-control- pincode" palceholder="Pin Code">
                        <span id="pincode_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Adrress 1</lable>
                        <input type="text" name="address1" value="{{$count_int == '0' ? '' :$user_data->address1}}" class="form-control form-control-sm address1" palceholder="Enter Address">
                        <span id="address1_error"></span>
                    </div>
                    <div class="col-md-6">
                        <lable>Address 2</lable>
                        <input type="text" name="address2" value="{{$count_int == '0' ? '' :$user_data->address2}}" class="form-control form-control-sm address2" palceholder="Enter Address">
                        <span id="address2_error"></span>
                        <input type="hidden" name="payment_method"  value="COD">
                    </div>
                    <div class="col-md-12">
                        <lable>Message</lable>
                        <textArea type="text" name="message" class="form-control form-control-sm message" palceholder="Your Message"></textArea>
                    </div>
                    <div class="col-md-12">

                        <input type="checkbox" name="check"  value="1" required>&nbsp;&nbsp;&nbsp;<lable>Accept all Terms and Conditions</lable>
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
            @if($cartItems->count() == 0)
            <div class="card-body">
               <h2> You have no Product for order</h2>
               <a href="{{ url('categories') }}" class="btn btn-outline-primary checkoutcart me-3 float-end">Click here go to Shoping</a>
            </div>
            @else
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
                    @php $total_amount+=$item->prod_qty*$item->products->original_price;
                    @endphp
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <input type="hidden" name="totalamount" value="{{$total_amount}}" class="amount" readonly/>
                            <strong>Total: <span class="float-end">{{$total_amount}} /-</span></strong>
                        </td>
                    </tr>
                </tbody>
                </table>
                <input type="submit" class="btn btn-success btn-sm  w-100" value="Palce Order | Cash on Delivery">
                <hr/>
                <button type="button" class="btn btn-primary btn-sm  w-100 razorpay_btn">Palce Order | With Razor Pay</button>
                <hr/>
                <div id="paypal-button-container"></div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<form>
</div>
@endsection
@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=AXkTFbjCnEq9SyPmubgwrKVhnD2Fw7ZqKHz6S0UzKYoFzjYv5n7hQMHtmQaOolGVMtUDaaxd1xkMqoOh&currency=USD"></script>
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<script>

paypal.Buttons({


  // Sets up the transaction when a payment button is clicked

  createOrder: function(data, actions) {

    return actions.order.create({

      purchase_units: [{

        amount: {

          value: '{{$total_amount}}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`

        }

      }]

    });

  },


  // Finalize the transaction after payer approval

  onApprove: function(data, actions) {

    return actions.order.capture().then(function(orderData) {

      // Successful capture! For dev/demo purposes:

           console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

           var transaction = orderData.purchase_units[0].payments.captures[0];
          // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
        var firstname = $('.firstname').val();
        var lastname=$('.lastname').val();
        var email=$('.email').val();
        var phone=$('.phone').val();
        var city=$('.city').val();
        var state=$('.state').val();
        var country=$('.country').val();
        var address1=$('.address1').val();
        var address2=$('.address2').val();
        var pincode=$('.pincode').val();
        var message=$('.message').val();
        var amount=$('.amount').val();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            method:"POST",
            url:"/place-order",
            data:{
                'f_name':firstname,
                'l_name':lastname,
                'email':email,
                'phone':phone,
                'city':city,
                'state':state,
                'country':country,
                'address1':address1,
                'address2':address2,
                'pincode':pincode,
                'totalamount':amount,
                'payment_method':'Paid by PayPal',
                'payment_id':orderData.id,
                'message':message
                },
                success:function(response){
                swal(response.status);
                window.location.href="/my-orders";
                 }
            });
    });

  }

}).render('#paypal-button-container');


</script>
@endsection
