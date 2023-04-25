<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{

    public function checkout(){
        $user = Auth::id();
        $cartItems= CartItem::where('cart_id', $user)->get();
        return view('checkout', compact('cartItems'));
    }

    public function createInvoice(Request $request)
    {
    
        $cart = Auth::user()->cart;
        $totalPrice = $cart->items->reduce(function ($accumulator, $item) {
            return $accumulator + $item->getTotalPrice();
        }, 0);

        $invoice = new Invoice([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'Email' => Auth::user()->Email,
            'generatedcode' => mt_rand(100000, 999999),
            'totalprice' => $totalPrice,
            'address' => $request->address,
            'kodepos' => $request->kodepos,
        ]);
        $invoice->save();

        return redirect()->route('invoice.show', ['id' => $invoice->id]);
        
    }


    public function showInvoice($id)
    {
        $user = Auth::id();
        $cartItems= CartItem::where('cart_id', $user)->get();
    
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
    $product->decrement('productqty', $cartItem->productqty);
        }

        $invoice = Invoice::find($id);

        $cart = Auth::user()->cart;
        $cart->items()->delete();

        return view('invoice', compact('invoice','cartItems'));
    }

}
