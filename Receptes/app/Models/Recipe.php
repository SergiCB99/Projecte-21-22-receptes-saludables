<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','user_id','name','image','description','prep_time'
    ];

    function user () {
        return $this->belongsTo(User::class);
    }

    function category () {
        return $this->belongsTo(Category::class);
    }

    function ingredients () {
        return $this->hasMany(Ingredient::class);
    }

    function steps () {
        return $this->hasMany(Steps::class);
    }

    function comments () {
        return $this->hasMany(Comment::class);
    }

}
