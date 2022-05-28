<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(){

        $roles = User::getRoles();

        $roles = array_flip($roles);

        if(Auth::check()){
            if(Auth::user()->role === $roles['Админ']){

                return view('admin.index', ['data' => Category::get()]);
            }
            else{
                return redirect(route('user.profile'));
            }
        }
        else{
            return redirect(route('user.login'));
        }

    }

    public function addPost(Request $request){

        $validation = $request->validate([
            'title' => 'required|min:4|max:20|unique:App\Models\Post,title',
            'description' => 'required|min:100|max:1000'
        ]);




        Post::create([
            'category_id' => $request['category'],
            'title' => $validation['title'],
            'description' => $validation['description'],

        ]);

        return redirect(route('user.admin'))->with('success' , 'Статья была создана');
    }
}
