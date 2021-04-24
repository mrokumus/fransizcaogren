<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/migrate', function () {
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed');
    Artisan::call('route:cache');
    Artisan::call('storage:link');
    dd('Tamamlandı');
});

// PUBLIC URL
Route::middleware('set.locale')
    ->group(function () {

        // LOCALISATION
        Route::get('/locale/{locale}', [App\Http\Controllers\SetLocaleController::class, 'setLocale'])->name('set.locale');

        // PUBLIC ROUTES
        Route::name('home')
            ->group(function () {
                // Home route
                Route::get('/', [App\Http\Livewire\Frontend\Home\Home::class, 'render']);
            });
        // Dictionary Route
        Route::get('/dictionary', [App\Http\Livewire\Frontend\Dictionary\Dictionary::class, 'render'])->name('.dictionary.render');


        //ADMIN ROUTES
        Route::middleware(['auth:sanctum', 'verified',])
            ->prefix('beta/')
            ->group(function () {
                //Dashboard
                Route::get('/', [App\View\Components\BackendLayout::class, 'render'])->name('dashboard');
                //Profile
                Route::get('profile', [App\Http\Livewire\Backend\Profile\Profile::class, 'render'])->name('profile.render');

            });





    });