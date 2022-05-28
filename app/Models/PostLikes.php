<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }


    public function posts()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }

    public function likesCount($posts)
    {
        $count = [];
        foreach ($posts as $post) {
            $count[$post->id] = PostLikes::where('post_id', $post->id)->count();
        }
        return $count;

    }

    public function checkLike($postId){
        if (PostLikes::where('post_id' , $postId)->where('user_id' , Auth::id())->exists()){
            return true;
        }
        else{
            return false;
        }
    }


}
