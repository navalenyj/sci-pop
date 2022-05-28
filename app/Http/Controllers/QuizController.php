<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        return view('games.quiz.index');
    }

    public function setResult(Request $request){

        QuizScore::create([
            'score' => $request['score'],
            'user_id' => Auth::id()
        ]);
    }
}
