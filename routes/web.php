<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\SendClientQueryController;
use App\Http\Livewire\Query\Index as ShowQueriesLivewireComponent;
use App\Http\Livewire\Query\Show as ShowQueryLivewireComponent;
use Illuminate\Support\Facades\Route;

// client
Route::view('', 'landing')->name('landing');
Route::post('send-query', SendClientQueryController::class)->name('send-query');

Route::view('query-sent', 'query-sent')->name('query-sent');

// admin
Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

    Route::middleware('auth')->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');

        Route::prefix('query')->name('query.')->group(function () {
            Route::get('', ShowQueriesLivewireComponent::class)->name('index');
            Route::get('{queryId}', ShowQueryLivewireComponent::class)->name('show');
        });

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
