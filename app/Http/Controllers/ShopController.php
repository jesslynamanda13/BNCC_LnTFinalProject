<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function show(){
        $user = Auth::user();
        $name = $user->name;
        $products = Product::all();
        $categories = Category::all();
        return view('shop', ['name' => $name], compact('products', 'categories'));
    }

    public function profile(){
        $user = Auth::user();
        $name = $user->name;
        $email = $user->Email;
        $phonenum = $user->phonenum;

        return view('profile', ['name' =>$name, 'email' => $email, 'phonenum' => $phonenum]);
    }
}
