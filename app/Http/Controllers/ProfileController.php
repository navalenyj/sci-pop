<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {

        return view('profile.index', ['user' => Auth::user()]);
    }

    public function changeData(Request $request)
    {


        if (empty($request->password) && empty($request->avatar)){
            return redirect()->back()->with('message' , 'Заполните поля');
        }

        $user = User::find(Auth::id());
        if ($request->password) {
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);
            $user->password = $request->password;
            $user->save();

        }


        if ($request->avatar) {

            $request->validate([
                'avatar' => 'image',
            ]);
            $path = $request->file('avatar')->store('uploads', 'public');
            $user->avatar = $path;
            $user->save();
        }

        return redirect()->back()->with('message' , 'Данные успешно изменены');
    }
}
