<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug'];
    /* 1 categoria muchas publicacciones */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
