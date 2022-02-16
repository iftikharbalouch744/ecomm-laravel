<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderitems;

class order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=[
        'F_Name',
        'L_Name',
        'Email',
        'Phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
        'tracking_no',
        'order_amount',
    ];
    public function orderItems(){
        return $this->hasMany(orderitems::class);
    }
}
