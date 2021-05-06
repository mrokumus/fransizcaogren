<?php

namespace App\Http\Livewire\Backend\Profile;

use Illuminate\Http\Request;
use Livewire\Component;

class Profile extends Component
{
    public function render(Request $request)
    {
        return view('livewire.backend.profile.profile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
