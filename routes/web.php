<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TweetController;
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

Route::get('/', [PublicController::class, 'home']);
Route::post('/tweets', [TweetController::class, 'store'])->middleware('auth');
Route::get('/user/{username}', [HomeController::class, 'index']);
Route::get('/user/{username}/follow', [HomeController::class, 'follow']);
Route::get('/tweet/{tweet}', [TweetController::class, 'show']);
Route::post('/tweet/{tweet}', [ReplyController::class, 'store']);
Route::get('/tweet/{tweet}/like', [LikeController::class, 'like']);
Route::get('/tweet/{tweet}/retweet', [TweetController::class, 'retweet']);
Route::get('/profile', [ProfileController::class, 'edit']);
Route::post('/profile', [ProfileController::class, 'update']);
Route::get('/tweet/{tweet}/delete', [TweetController::class, 'destroy']);
Route::get('/reply/{reply}/delete', [ReplyController::class, 'destroy']);

Auth::routes();
