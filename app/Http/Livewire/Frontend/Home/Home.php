<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Frontend\FrontendMenus;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $menuItems = FrontendMenus::all();
        return view('livewire.frontend.home.home')
            ->with('menuItems', $menuItems);
    }
    public function renderr()
    {
        return view('livewire.frontend.home.homee');
    }
}
