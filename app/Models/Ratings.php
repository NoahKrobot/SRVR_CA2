<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ratings extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'users_and_ratings';

    protected $fillable = [
        'user_id', 'meal_id', 'rating',
    ];
   

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
