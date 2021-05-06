<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetaMenus extends Model
{
    use HasFactory;
    protected $table = 'beta_menus';
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
