<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    /**
    *@return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id','id');
    }
}
