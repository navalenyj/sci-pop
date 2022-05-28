<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SciPopController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PandemicController;
use App\Http\Controllers\ResetPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/skipop', [SciPopController::class, 'index'])->name('ski-pop');
Route::post('/skipop/like/{id}', [SciPopController::class, 'likeAction'])->name('ski-pop.add.like')->middleware('auth');
Route::get('/skipop/{category}', [SciPopController::class, 'index'])->name('ski-pop.category');

Route::get('/pandemic', [PandemicController::class, 'index'])->name('pandemic');

Route::get('/reset-password/{token}', function ($token) {
    return view('login.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/password/request' , [ResetPasswordController::class , 'index'])->middleware('guest')->name('password.request');
Route::post('/password/request' , [ResetPasswordController::class , 'passwordRequest'])->middleware('guest')->name('password.request');
Route::post('/password-reset' , [ResetPasswordController::class , 'passwordReset'])->middleware('guest')->name('password.update');

Route::name('user.')->group(function () {

   Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');

    Route::post('/profile' , [ProfileController::class , 'changeData'])->name('change.data');

    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/register', [RegisterController::class, 'register']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin', [AdminController::class, 'addPost'])->name('admin.post.add');
});

Route::name('game.')->group(function () {

    Route::get('/games', [GameController::class, 'index'])->name('all');

    Route::get('/quiz', [QuizController::class, 'index'])->middleware('auth')->name('quiz');

    Route::post('/quiz/save', [QuizController::class, 'setResult'])->name('result.add');

    Route::get('/records', [RecordsController::class, 'index'])->name('quiz.records');
});







