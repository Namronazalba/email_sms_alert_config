<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlertConfig\AlertConfigController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/alert-config', [AlertConfigController::class, 'index'])->name('alert.config');

    Route::get('/alert-config/email', [AlertConfigController::class, 'email'])->name('alert.email');
    // Route::post('/alert-config/email/save', [AlertConfigController::class, 'saveEmailConfig'])->name('alert.email.save');

    Route::get('/alert-config/sms', [AlertConfigController::class, 'sms'])->name('alert.sms');
    // Route::post('/alert-config/sms/save', [AlertConfigController::class, 'saveSmsConfig'])->name('alert.sms.save');
    Route::post('/alert-config/{type}/save', [AlertConfigController::class, 'saveConfig'])->name('alert.config.save');


});

require __DIR__.'/auth.php';
