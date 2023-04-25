<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem as CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function addToCart(Request $request, $product_id)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $product = Product::findOrFail($product_id);

        $existingItem = $cart->items()->where('product_id', $product_id)->first();

        if($product->productqty == 0){
            return back()->withInput()->withErrors(['stock' => 'Out of stock']);
        }
        else if ($existingItem) {
            if ($existingItem->productqty >= $product->productqty) {
                return back()->withInput()->withErrors(['quantity' => 'The quantity in your cart exceeds the available quantity.']);
            }
            $existingItem->increment('productqty');
        }else {
            $cartItem = new CartItem([
                'product_id' => $product->id,
                'productname' => $product->productname,
                'productqty' => 1,
                'productprice' => $product->productprice,
                'productimg' => $product->productimg,
            ]);

            $cart->items()->save($cartItem);
        }

        return redirect('/shop');
    }
}
