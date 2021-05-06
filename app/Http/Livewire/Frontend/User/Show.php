<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\User;
use App\Models\UserPreference;
use Livewire\Component;

class Show extends Component
{
    public function render($username)
    {
        $userId = UserPreference::where('username', $username)->get('user_id');
        $user = User::where('id', $userId[0]->user_id)->get();
        return view('livewire.frontend.user.show')->with('user', $user);
    }
}
