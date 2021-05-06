<?php

namespace App\View\Components;

use App\Models\Backend\BetaMenus;
use Illuminate\View\Component;

class BackendLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $menuItems = BetaMenus::all();
        return view('layouts.backend')
            ->with('menuItems', $menuItems);
    }

}
