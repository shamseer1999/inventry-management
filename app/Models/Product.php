<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'sale_price',
        'mrp',
        'quantity',
        'category_id',
        'created_by'
    ];

    public function categories()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function assigned()
    {
        return $this->hasOne(User::class,'id','assigned_user')->withDefault();
    }
}
