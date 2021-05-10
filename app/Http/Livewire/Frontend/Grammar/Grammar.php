<?php

namespace App\Http\Livewire\Frontend\Grammar;

use App\Models\Frontend\GrammarPosts;
use App\Models\Frontend\Grammars;
use Illuminate\Http\Request;
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

    public function search(Request $request)
    {
        return Grammars::search($request)->raw();
    }


}

