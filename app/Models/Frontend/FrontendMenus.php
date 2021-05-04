<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendMenus extends Model
{
    use HasFactory;

    protected $table = 'frontend_menus';
    protected $fillable = [
        'title',
        'icon',
        'slug',
        'mobile_visibility',
        'submenu_id',
        'status',
        'meta',
        'keys',
    ];

}
