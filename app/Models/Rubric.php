<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_to_rubrics', 'rubric_id', 'post_id');
    }
}
