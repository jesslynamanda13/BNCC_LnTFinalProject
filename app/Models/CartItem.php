<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'productname',
        'productqty',
        'productprice',
        'productimg'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalPrice()
    {
        return $this->productqty * $this->productprice;
    }

    public function updateQuantity($quantity)
    {
        $this->quantity = $quantity;
        $this->save();
    }

    
}
