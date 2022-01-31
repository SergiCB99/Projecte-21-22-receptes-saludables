<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_id','step'
    ];

    function recipe () {
        return $this->belongsTo(Recipe::class);
    }
}
