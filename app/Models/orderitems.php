<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitems extends Model
{
    use HasFactory;
    protected $table='orderitems';
    protected $fillable=[
        'order_id',
        'prod_id',
        'prod_qty',
        'prod_price',
        'prod_sub_total',
    ];
}