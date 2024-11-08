<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    use HasFactory;

    protected $fillable = [
        'monster_name',
        'alignment',
        'challenge_rating',
        'armour_class',
        'image_url',
        'description',
        'created_at',
        'updated_at'
    ];

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class, 'favourite_monster_user');
    }

}
