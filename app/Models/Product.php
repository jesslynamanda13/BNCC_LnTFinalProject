<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'productprice',
        'productqty',
        'productimg',
        'ctg_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'ctg_id', 'id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
