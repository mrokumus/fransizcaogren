<?php

namespace App\View\Components;

use App\Models\Frontend\FrontendMenus;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(): \Illuminate\View\View
    {
        $menuItems = FrontendMenus::all();
        return view('layouts.frontend')->with('menuItems', $menuItems);
    }
}
