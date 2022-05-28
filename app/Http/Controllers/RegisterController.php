<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){

        if (Auth::check()){
            return redirect(route('user.profile'));
        }

        return view('register.index');
    }


    public function register(RegisterRequest $request){

        $path = 'uploads/avatar.jpg';

        if($request->file('avatar')){
            $path = $request->file('avatar')->store('uploads','public');
        }

        $roles = User::getRoles();

        $roles = array_flip($roles); //меняем ключ значение , мб это можно было сделать в методы getRoles() , но хз

        $user = User::create([
            'login' => $request['login'],
            'email' => $request['email'],
            'password' => $request['password'],
            'avatar' => $path,
            'role' => $roles['Пользователь']
        ]);


        if($user){
            Auth::login($user);
            return redirect(route('home'));
        }
    }
}
