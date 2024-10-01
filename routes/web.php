<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\MessageController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $team = Team::all(); 
    return view('home', compact('team'));
});

Route::resource('blog', BlogController::class);


Route::get('/dashboard', [dashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');

Route::patch('/blogs/{id}/enable', [PostController::class, 'updateEnable'])->name('blogs.updateEnable');

Route::get('contact', function () {
    return view('contact');
})->name('contact.form');

Route::post('messages', [MessageController::class, 'store'])->name('messages.store');

Route::middleware('auth')->group(function () {

    // Route::get('/inbox', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('blogs', PostController::class);
    Route::resource('team', TeamController::class);
    Route::resource('/inbox', MessageController::class);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
