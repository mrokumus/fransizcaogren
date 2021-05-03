<?php

namespace App\Http\Livewire\Frontend\Grammar;

use App\Models\Frontend\GrammarPosts;
use App\Models\Frontend\Grammars;
use Livewire\Component;

class Grammar extends Component
{
    public function render($slug = null)
    {
        $content = [];
       if (!$slug == null){
           $content = GrammarPosts::where('slug', $slug)->get();
       }
        $grammarMenuItems = Grammars::all();
        return view('livewire.frontend.grammar.grammar')
            ->with('grammarMenuItems', $grammarMenuItems)
            ->with('content', $content);

    }


}

