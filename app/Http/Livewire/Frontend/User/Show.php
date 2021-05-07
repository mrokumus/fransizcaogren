<?php

namespace App\Http\Livewire\Frontend\User;

use App\Models\User;
use App\Models\UserPreference;
use Livewire\Component;

class Show extends Component
{
    public function render($username)
    {
        $userId = UserPreference::where('username', $username)->get();
        if ( isset($userId[0]->user_id)){
            $user = User::where('id', $userId[0]->user_id)->get();
            if ($userId[0]->profile_visibility == 1){
                return view('livewire.frontend.user.show')->with('user', $user[0]);
            }else{
                abort('404','This user does not exist');
            }
        }else{
            abort('404','This user does not exist');
        }
    }
}
