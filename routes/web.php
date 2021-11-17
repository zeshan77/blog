<?php

use App\Http\Controllers\Admin\PostController;
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

});




require __DIR__.'/auth.php';
