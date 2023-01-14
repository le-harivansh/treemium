<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendClientQueryController;
use Illuminate\Support\Facades\Route;

Route::view('', 'client.index')->name('landing');

Route::post('send-query', SendClientQueryController::class)->name('send-query');

Route::view('query-sent', 'client.query-sent')->name('query-sent');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
