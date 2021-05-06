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
        //THEME
        Route::get('/theme/{theme}', [App\Http\Controllers\SetThemeController::class, 'setTheme'])->name('set.theme');

        // PUBLIC ROUTES
        Route::name('home')
            ->group(function () {
                // Home route
                Route::get('/', [App\Http\Livewire\Frontend\Home\Home::class, 'render'])->name('');
                // Dictionary Route
                Route::get('/dictionary', [App\Http\Livewire\Frontend\Dictionary\Dictionary::class, 'render'])->name('.dictionary.render');
                // Conjugation Route
                Route::get('/conjugation', [App\Http\Livewire\Frontend\Conjugation\Conjugation::class, 'render'])->name('.conjugation.render');
                // Grammar Route
                Route::get('/grammar/{slug?}', [App\Http\Livewire\Frontend\Grammar\Grammar::class, 'render'])->name('.grammar.render');
                // Vocabulary Route
                Route::get('/vocabulary', [App\Http\Livewire\Frontend\Vocabulary\Vocabulary::class, 'render'])->name('.vocabulary.render');
                // Exams Route
                Route::get('/exam', [App\Http\Livewire\Frontend\Exam\Exam::class, 'render'])->name('.exam.render');
                // Culture Route
                Route::get('/culture', [App\Http\Livewire\Frontend\Culture\Culture::class, 'render'])->name('.culture.render');
                // Forum Route
                Route::get('/forum', [App\Http\Livewire\Frontend\Forum\Forum::class, 'render'])->name('.forum.render');
                // Blog Route
                Route::get('/blog', [App\Http\Livewire\Frontend\Blog\Blog::class, 'render'])->name('.blog.render');
                // Contact Route
                Route::get('/contact', [App\Http\Livewire\Frontend\Contact\Contact::class, 'render'])->name('.contact.render');
            });

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