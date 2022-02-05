<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='Products';
    protected $fillable=[
            'cate_id',
            'name',
            'small_description',
            'description',
            'original_price',
            'selling_price',
            'image',
            'qty',
            'tex',
            'status',
            'trending',
            'meta_title',
            'meta_keywords',
            'meta_description',
    ];
}
