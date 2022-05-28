<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostLikes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SciPopController extends Controller
{


    public function index($categoryId = 0)
    {
        $categories = Category::get();
        $posts = Post::latest();
        if ($categoryId){
           $posts = $posts->where('category_id' , $categoryId);
        }


        $posts = $posts->paginate(6);
        $likesCount = PostLikes::likesCount($posts);

        return view('ski-pop.index', ['posts' => $posts, 'categories' => $categories, 'likes' => $likesCount]);
    }


    public function likeAction($post_id)
    {

        $user_id = auth()->id();

        //$isLike = DB::select('SELECT id FROM `post_likes` WHERE `post_id`=? AND `user_id` = ?', [$post_id, $user_id]);(напоминалка)
        $isLike = PostLikes::where('post_id', $post_id)->where('user_id', $user_id)->take(1)->get();


        if (empty($isLike[0])) {

            PostLikes::create([
                'post_id' => $post_id,
                'user_id' => $user_id
            ]);

        } else {

            $isLike[0]->delete();

        }


        return redirect()->back();
    }
}
