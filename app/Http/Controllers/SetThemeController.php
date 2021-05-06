<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class SetThemeController extends Controller
{
    public function setTheme($theme): \Illuminate\Http\RedirectResponse
    {
        if (isset(auth()->user()->id) && isset($theme)) {
            Session::put('theme', $theme);
            auth()->user()->preferences()->update([
                'theme' => $theme,
            ]);
        } elseif (isset(auth()->user()->preferences->theme)) {
            Session::put('theme', auth()->user()->preferences->theme);
        } else {
            Session::put('theme', $theme);
        }
        return redirect()->back();
    }
}
