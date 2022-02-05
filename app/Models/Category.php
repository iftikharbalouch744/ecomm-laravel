<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
        'slug',
        'discription',
        'status',
        'populer',
        'image',
        'meta_title',
        'meta_discription',
        'meta_keywords',
    ];


    public function products(){
        return $this->hasMany(Product::class,'cate_id');
    }
}
