<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarPosts extends Model
{
    use HasFactory;

    protected $table = 'grammar_posts';

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
    ];
}
