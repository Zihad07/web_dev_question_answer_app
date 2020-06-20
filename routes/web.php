<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeUnlikeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionLikeUnlikeController;
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
Route::get('/about',[\App\Http\Controllers\ExploreController::class,'about'])->name('about');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('question/new', [QuestionController::class,'create'])->name('question.create');
    Route::post('question/new', [QuestionController::class,'store'])->name('question.store');
    Route::get('question/my_questions', [QuestionController::class,'myQuestion'])->name('question.eachuser');


    Route::post('/question/{question}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comments/mycomments', [CommentController::class,'index'])->name('comment.mycomments');


    Route::get('/question_like/{question}', [QuestionLikeUnlikeController::class, 'like'])->name('question.like');
    Route::get('/question_unlike/{question}', [QuestionLikeUnlikeController::class, 'unlike'])->name('question.unlike');
    Route::get('/comment_like/{question}/{comment}', [CommentLikeUnlikeController::class, 'like'])->name('comment.like');
    Route::get('/comment_unlike/{question}/{comment}', [CommentLikeUnlikeController::class, 'unlike'])->name('comment.unlike');

    Route::get('/question_like/refresh/{question}',[QuestionLikeUnlikeController::class,'refreshLike'])->name('question.refreshlike');
    Route::get('/question_unlike/refresh/{question}',[QuestionLikeUnlikeController::class,'refreshUnike'])->name('question.refreshunlike');

    Route::get('/comment_like_unlike/refresh/{comment}',[CommentLikeUnlikeController::class,'refresh'])->name('comment.refresh');
// Route::get('')

});
Route::get('/question/{question}', [QuestionController::class,'show'])->name('question.show');
