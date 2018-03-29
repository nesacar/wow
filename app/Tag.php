<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['id', 'title', 'slug', 'publish'];

    public function post(){
        return $this->belongsToMany(Post::class);
    }
}
