<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Livewire\Frontend\Home\Home::class,'render'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
