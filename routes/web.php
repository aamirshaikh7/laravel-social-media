<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/lweets', [App\Http\Controllers\LweetController::class, 'index'])->name('home');

    Route::post('/lweets', [App\Http\Controllers\LweetController::class, 'store'])->name('lweets.store');

    Route::get('/lweets/{lweet}/edit', [App\Http\Controllers\LweetController::class, 'edit'])->name('lweets.edit');
    
    Route::post('/lweets/{lweet}/like', [App\Http\Controllers\LikeController::class, 'store'])->name('lweets.like.store');

    Route::post('/lweets/{lweet}/relweet', [App\Http\Controllers\RelweetController::class, 'store'])->name('lweets.relweet.store');
    
    Route::get('profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
    
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');

    Route::patch('profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
    
    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowController::class, 'store'])->name('follow.store');
    
    Route::get('profiles/{user:username}/likes', [App\Http\Controllers\LikeController::class, 'index'])->name('likes.index');
    
    Route::get('profiles/{user:username}/relweets', [App\Http\Controllers\RelweetController::class, 'index'])->name('relweets.index');
    
    Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    
    Route::get('/explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('explore.index');
});