<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginRegisterController extends Controller
{
    public function login(){
        return view("login");
    }

    public function welcome(){
        return view("welcome");
    }

    public function register(){
        return view("register");
    }

    public function shop(){
        return view("shop");
    }

    

    function loginData(Request $request){

        Session::flash('Email', $request->Email);
 
         $request->validate([
             'Email' => 'required',
             'password' => 'required',
         ], 
         [
             'Email.required' => 'Email cannot be empty',
             'password.required' => 'Password cannot be empty',
         ]);
 
         $infologin = [
             'Email'=> $request->Email,
             'password'=> $request->password
         ];
 
       
         if(Auth::attempt($infologin)){
            if(auth()->user()->isAdmin){
                return redirect('/dashboard');
            }else{
                return redirect('/shop');
            }
             // klo proses auth sukses
             // Auth::login($user, $request->get('remember')
             
         }else{
             // klo gagal
             return redirect('/login');
         }
     }

     function create(Request $request){

        Session::flash('Email', $request->Email);

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:40|unique:users',
            'phonenum' => 'required|unique:users',
            'Email' =>['required', function ($attribute, $value, $fail) {
                if (!strpos($value, '@gmail.com')) {
                    $fail('The '.$attribute.' field must contain "@gmail.com"');
                }
            }, 'unique:users'],
            'password' => 'required|min:6|max:12'
        ]);

        $account = [
            'name' => $request->name,
            'Email' => $request->Email,
            'phonenum' => $request->phonenum,
            'password' => Hash::make($request->password),

            
        ];
        $user = User::create($account);

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();

        $infologin = [
            'Email'=> $request->Email,
            'password'=> $request->password
        ];

        if(Auth::attempt($infologin)){
            // klo proses auth sukses
            return redirect('/login');
        }else{
            // klo gagal
            return redirect('/register');
        }
     }

     function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'berhasil logout');
    }

}
