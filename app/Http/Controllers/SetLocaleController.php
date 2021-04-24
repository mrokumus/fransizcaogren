<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
    public function setLocale($locale): \Illuminate\Http\RedirectResponse
    {
        if (isset(auth()->user()->id) && isset($locale)) {
            Session::put('locale', $locale);
            User::where('id', auth()->user()->id)
                ->update(['preferred_language' => $locale]);
        } elseif (isset(auth()->user()->preferred_language)) {
            Session::put('locale', auth()->user()->preferred_language);
        } else {
            Session::put('locale', $locale);
        }
        return redirect()->back();
    }
}
