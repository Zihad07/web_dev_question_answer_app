<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {return view('welcome');});
Route::get('/', [QuestionController::class, 'index'])->name('allQuestion');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('question/new', [QuestionController::class,'create'])->name('question.create');
    Route::post('question/new', [QuestionController::class,'store'])->name('question.store');
    Route::get('question/my_questions', [QuestionController::class,'myQuestion'])->name('question.eachuser');
    Route::get('/question/{question}', [QuestionController::class,'show'])->name('question.show');

    Route::post('/question/{question}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comments/mycomments', [CommentController::class,'index'])->name('comment.mycomments');
});

// Route::get('')
