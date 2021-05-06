<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $table = 'user_preferences';

    protected $fillable = [
        'preferred_theme',
        'preferred_language',
        'username'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
