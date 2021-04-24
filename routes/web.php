<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Livewire\Frontend\Home\Home::class, 'render'])->name('home');
Route::get('/migrate', function () {

    Artisan::call('migrate:refresh');
    Artisan::call('db:seed');
    Artisan::call('route:cache');
    Artisan::call('storage:link');
    dd('Tamamlandı');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
