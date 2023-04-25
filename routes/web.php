<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginRegisterController::class, 'welcome']);
Route::get('/login', [LoginRegisterController::class, 'login'])->middleware('isUser');
Route::get('/shop', [ShopController::class, 'show'])->middleware('isnotUser');
Route::get('/profile', [ShopController::class, 'profile'])->middleware('isnotUser');
Route::get('/register', [LoginRegisterController::class, 'register'])->middleware('isUser');
// Route::get('/dashboard', [ProductController::class, 'show'])->middleware('isAdmin');
Route::get('/dashboard', function(){
    $products = Product::all();
    $categories = Category::all();
    return view('dashboard', compact('products', 'categories'));
})->middleware('isAdmin');
Route::get('/editproduct/{id}',[ProductController::class, 'edit'])->name('edit')->middleware('isAdmin');
Route::patch('/updateproduct/{id}', [ProductController::class, 'update'])->name('update');
Route::delete('/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware('isAdmin');
Route::delete('/deletecart/{id}', [CartController::class, 'destroy'])->name('destroycart')->middleware('isAdmin');

Route::get('/logout', [LoginRegisterController::class, 'logout']);
Route::post('/logout', [LoginRegisterController::class, 'logout']);
Route::post('/create', [LoginRegisterController::class, 'create']);
Route::post('/loginData', [LoginRegisterController::class, 'loginData']);
Route::post('/store-Category',[CategoryController::class,'store']);
Route::post('/storeProduct',[ProductController::class,'storeProduct']);
Route::get('/addProduct',[ProductController::class,'addProduct'])->middleware('isAdmin');
Route::get('/admincategory',[CategoryController::class,'create'])->middleware('isAdmin');

// cart
Route::post('/cart/add/{product_id}', [CartItemController::class, 'addToCart'])->name('cart.add')->middleware('isnotUser');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show')->middleware('isnotUser');

// co
Route::get('/checkout', [InvoiceController::class, 'checkout'])->middleware('isnotUser');
Route::post('/createInvoice',[InvoiceController::class, 'createInvoice'] );
// Route::get('/invoice', [InvoiceController::class, 'showInvoice']);
Route::get('/invoice/{id}', [InvoiceController::class, 'showInvoice'])->name('invoice.show')->middleware('isnotUser');

// Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoices.show');


