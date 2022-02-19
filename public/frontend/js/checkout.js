$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();
       // alert('Rayzor Pay Click');
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
        if(!firstname){
            fname_error='First Name Required !!';
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else{
            $('#fname_error').html('');
        }
        if(!lastname){
            lname_error='Last Name Required !!';
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else{
            $('#fname_error').html('');
        }
        if(!email){
            email_error='Email Required !!';
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else{
            $('#fname_error').html('');
        }
        if(!phone){
            phone_error='Phone Required !!';
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else{
            $('#phone_error').html('');
        }
        if(!city){
            city_error='City Required !!';
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else{
            $('#city_error').html('');
        }
        if(!state){
            state_error='State Name Required !!';
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else{
            $('#state_error').html('');
        }
        if(!country){
            country_error='Country Name Required !!';
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else{
            $('#fname_error').html('');
        }
        if(!address1){
            address1_error='Address1 Required !!';
            $('#address1_error').html('');
            $('#address1_error').html(address1_error);
        }
        else{
            $('#address1_error').html('');
        }
        if(!address2){
            address2_error='Address2 Required !!';
            $('#address2_error').html('');
            $('#address2_error').html(fname_error);
        }
        else{
            $('#address2_error').html('');
        }
        if(!pincode){
            pincode_error='Pincode Required !!';
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else{
            $('#pincode_error').html('');
        }
        if(fname_error!='' || lname_error!='' || email_error!='' || phone_error!='' || state_error!='' || city_error!='')
        {
            return false;
        }
        else{

        }
    });
});
