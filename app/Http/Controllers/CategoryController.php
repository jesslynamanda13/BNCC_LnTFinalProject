<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('addcategory');
    }

    public function store(Request $request){
        $request->validate([
            'categoryname' => 'required|unique:categories,categoryname,except,id',
        ]);

        Category::create([
            'categoryname' => $request->categoryname,
        ]);
        return redirect('/dashboard');
    }
}
