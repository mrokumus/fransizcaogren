<?php

namespace App\Http\Livewire\Frontend\Grammar;

use App\Models\Frontend\Grammars;
use Livewire\Component;

class Grammar extends Component
{
    public function render()
    {
        $grammarMenuItems = Grammars::all();
        return view('livewire.frontend.grammar.grammar')
            ->with('grammarMenuItems', $grammarMenuItems);
    }
}
