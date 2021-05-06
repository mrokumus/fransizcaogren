<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class SetThemeController extends Controller
{
    public function setTheme($theme): \Illuminate\Http\RedirectResponse
    {
        if (isset(auth()->user()->id) && isset($theme)) {
            Session::put('theme', $theme);
            User::where('id', auth()->user()->id)
                ->update(['preferred_theme' => $theme]);
        } elseif (isset(auth()->user()->preferred_theme)) {
            Session::put('theme', auth()->user()->preferred_theme);
        } else {
            Session::put('theme', $theme);
        }
        return redirect()->back();
    }
}
