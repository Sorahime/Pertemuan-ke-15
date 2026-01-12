<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

/*
| Redirect Root
*/
Route::get('/', function () {
    return redirect('/tickets');
});

/*
| Authenticated Routes
*/
Route::middleware('auth')->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::post('comments', [CommentController::class, 'store']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
| Auth Routes (Login, Register, Logout)
*/
require __DIR__.'/auth.php';
