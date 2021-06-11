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

    Route::get('profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
    
    Route::get('/profiles/{user:username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');

    Route::patch('profiles/{user:username}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
    
    Route::post('/profiles/{user:username}/follow', [App\Http\Controllers\FollowController::class, 'store'])->name('follow.store');
});