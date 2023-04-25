<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function addProduct(){
        $categories = Category::all();
        return view ('addproduct', compact('categories'));
    }

    public function storeProduct(Request $request){
        $validated = $request->validate([
            'productname' => 'required|unique:products|min:5|max:80',
            'productprice' =>'required|integer',
            'productqty' => 'required|integer',
            'productimg' =>'required|mimes:jpg,png',
        ]);

        $extension = $request->file('productimg')->getClientOriginalExtension();
        $filename = $request->judul . '_' . $request->productname . '.' . $extension;
        $request->file('productimg')->storeAs('/public/Products/', $filename);

       

        Product::create([
            'productname' => $request->productname,
            'productprice' => $request->productprice,
            'productqty' => $request->productqty,
            'productimg' => $filename,
            'ctg_id' => $request->ctg_id
        ]);
        return redirect('/dashboard');
    }

    public function show(){
        $products = Product::all();
        $categories = Category::all();
        return view('dashboard', compact('products', 'categories'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('editproduct', compact('product', 'categories'));
    }

    public function update(Request $request, $id){

        $product = Product::findOrFail($id);
    
        if ($request->hasFile('productimg')) {
            $extension = $request->file('productimg')->getClientOriginalExtension();
            $filename = $request->judul . '_' . $request->productname . '.' . $extension;
            $request->file('productimg')->storeAs('/public/Products/', $filename);
            $product->productimg = $filename;
        }
    
        $product->productname = $request->productname;
        $product->productprice = $request->productprice;
        $product->productqty = $request->productqty;
        $product->ctg_id = $request->ctg_id;
        $product->save();
    
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/dashboard');
    }

    
}
