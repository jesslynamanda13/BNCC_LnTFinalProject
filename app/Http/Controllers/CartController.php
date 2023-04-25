<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {   
        $user = Auth::id();
        $cartItems= CartItem::where('cart_id', $user)->get();

        $totalPrice = $cartItems->reduce(function ($accumulator, $item) {
            return $accumulator + $item->getTotalPrice();
        }, 0);

        
        $floatval = number_format($totalPrice, 0);

        // Output the total price
        echo $floatval;

        return view('cart', compact('cartItems', 'floatval'));
    }

    public function destroy($id)
    {
        $product = CartItem::findOrFail($id);
        $product->delete();

        return redirect('/cart');
    }
}
