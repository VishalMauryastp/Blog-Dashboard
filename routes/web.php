<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});


Route::get('/dashboard', [dashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');


// Route::post('/blogs/update-enable', [PostController::class, 'updateEnable']);

// Route::patch('/posts/{id}/enable', [PostController::class, 'updateEnable'])->name('posts.updateEnable');
Route::patch('/blogs/{id}/enable', [PostController::class, 'updateEnable'])->name('blogs.updateEnable');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('blogs', PostController::class);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
