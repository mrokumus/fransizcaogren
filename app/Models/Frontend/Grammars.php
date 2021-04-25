<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammars extends Model
{
    use HasFactory;

    protected $table = 'grammar_menus';

    protected $fillable = [
        'title',
        'slug',
        'sub_slug',
        'sub_menu_id',
        'meta',
    ];
}
