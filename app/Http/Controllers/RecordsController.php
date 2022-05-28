<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use Illuminate\Http\Request;
use App\Models\User;

class RecordsController extends Controller
{
    public function index()
    {
        $quizScores = collect(QuizScore::orderBy('score', 'desc')->take(20)->orderBy('created_at' , 'desc')->get());

        $quizScoresQnique = $quizScores->unique('user_id');

        $quizScoresQnique = $quizScoresQnique->values()->take(10)->all();



        return view('records.index', ['data' => $quizScoresQnique]);
    }
}
