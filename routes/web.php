<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('pages.welcome');
});

Route::prefix('/dashboard')->middleware(['auth'])
    ->group(function(){

        Route::get('/', [PostController::class, 'index'])->name('dashboard');
        Route::post('/', [PostController::class, 'create'])->name('post.create');

        Route::post('/comments/{id}', [CommentController::class, 'create'])->name('comment.create');
    });

require __DIR__.'/auth.php';
