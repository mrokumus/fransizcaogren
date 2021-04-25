<?php

namespace App\Http\Livewire\Frontend\Forum;

use App\Models\Frontend\Grammars;
use Livewire\Component;

class Forum extends Component
{
    public function render()
    {
        $grammarMenuItems = Grammars::all();
        return view('livewire.frontend.forum.forum')
            ->with('grammarMenuItems', $grammarMenuItems);
    }
}
