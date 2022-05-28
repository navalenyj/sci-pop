<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\QuizScore;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $quizScores = collect(QuizScore::orderBy('score', 'desc')->orderBy('created_at' , 'desc')->get());

        $quizScoresQnique = $quizScores->unique('user_id');

        $quizScoresQnique = $quizScoresQnique->values()->take(3)->all();

        $posts = Post::latest()->take(3)->get();

        return view('home.index', ['records' => $quizScoresQnique , 'posts' => $posts]);
    }
}
