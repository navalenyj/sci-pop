<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect(route('user.profile'));
        }

        return view('login.index');
    }

    public function login(Request $request){
        $formFields = $request->only(['login' , 'password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('home'));
        }

        return redirect(route('user.login'))->withErrors([
           'auth' => 'Не верный логин или пароль'
        ]);
    }
}
