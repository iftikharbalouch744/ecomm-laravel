$(document).ready(function () {
    $('.addtocart').click(function (e) {
        e.preventDefault();
        var prod_id=$('.prod_id').val();
        var prod_qty=$('.qty-input').val();

        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            method:"POST",
            url:"/add-to-cart",
            data:{
                'prod_id': prod_id,
                'prod_qty': prod_qty,
            },
            success:function(response){
                swal(response.status);
            }
        });
    });
    // Increments and decrements
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value=$(this).closest('.form-data').find('.qty-input').val();
        //var incre_value = $('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            $(this).closest('.form-data').find('.qty-input').val(value);
           // $('.qty-input').val(value);
        }

    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var data=0;
        var decre_value=$(this).closest('.form-data').find('.qty-input').val();
       // var decre_value = $('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).closest('.form-data').find('.qty-input').val(value);
            $(this).closest('.form-data').find('.hide-input').val(value);
            //$('.hide-input').val(data);
        }
    });
    $('.checkout').click(function (e) {
        e.preventDefault();
        var prod_id=$('.prod_id').val();
        var prod_qty=$('.qty-input').val();

        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $.ajax({
            method:"POST",
            url:"/check-out",
            data:{
                'prod_id': prod_id,
                'prod_qty': prod_qty,
            },
            success:function(response){
                swal(response.status);
            }
        });
    });
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();
        var prod_id=$(this).closest('.form-data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                method:"POST",
                url:"/delete-cart-item",
                data:{
                    'prod_id': prod_id,
                },
                success:function(response){
                    swal("",response.status,"success");
                    window.location.reload();
                }
            });
    });
    $('.changeqty').click(function (e) {
        e.preventDefault();
        var prod_id=$(this).closest('.form-data').find('.prod_id').val();
        var prod_qty=$(this).closest('.form-data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                method:"POST",
                url:"/update-cart-qty",
                data:{
                    'prod_id': prod_id,
                    'prod_qty': prod_qty,
                },
                success:function(response){
                    //swal("",response.status,"success");
                    window.location.reload();
                }
            });
    });
});
