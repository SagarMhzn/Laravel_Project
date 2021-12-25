<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserpostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/',[IndexController::class, "index"])->name('home');

Route::prefix('user')->middleware('auth')->group( function(){
    Route::get('/form',[UserpostController::class,"create"])->name('user.addpostform');
    Route::post('/store/{user_id}',[UserpostController::class,"store"])->name('userpost.store');
    Route::get('/timeline/{user_id}',[UserController::class,"show"])->name('user.timeline');
    Route::get('/timeline/edit/{post_id}',[UserController::class,"edit"])->name('user.timeline.edit');
    Route::post('/userpost/edit/{post_id}',[UserpostController::class,"update"])->name('userpost.update');
    Route::get('/userpost/delete/{post_id}',[UserpostController::class,"destroy"])->name('user.timeline.delete');
});

Route::get('/userProfile/{user_id}', [UserpostController::class, 'showProfile'])->name('user.profile');
Route::get('/aboutUs', function() {
    return view('about');
})->name('aboutUs');

//Route::middleware('auth')->get('/comment/{post_id}', [CommentController::class, "show"]) -> name('user.comment');

Route::get('/comment/{post_id}',[CommentController::class, "show"])->name('user.comment'); 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('user')->group( function(){
    Route::get('/userComment/{user_id}/{post_id}',[CommentController::class,"store"])->name('user.reply');
    // Route::get('/userComment/{user_id}/{post_id}',[CommentController::class,"index"])->name('user.replyshow');
});
