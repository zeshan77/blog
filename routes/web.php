<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController as FrontCommentController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/posts/{slug}', [HomeController::class, 'show']);
Route::post('/posts/{slug}/comments', [PostCommentController::class, 'store'])->name('posts.comments');

Route::get('comments/{comment}/delete', [FrontCommentController::class, 'destroy']);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'admin/posts'], function() {
        Route::get('', [PostController::class, 'index'])->name('posts.index');
        Route::post('', [PostController::class, 'store'])->name('posts.store');
        Route::get('create', [PostController::class, 'create'])->name('posts.create');
        Route::get('{post}/delete', [PostController::class, 'destroy'])->name('posts.delete');
        Route::get('{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('{post}', [PostController::class, 'update'])->name('posts.update');
    });

    Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');

    // Deprecated in favor of approval route
    Route::get('admin/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');

    Route::get('admin/comments/{comment}/approval', [CommentController::class, 'approval'])->name('comments.approval');


    Route::get('admin/comments/{comment}/delete', [CommentController::class, 'destroy'])->name('comments.destroy');

});




require __DIR__.'/auth.php';
