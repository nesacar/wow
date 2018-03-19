<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';

    protected $fillable = ['id', 'name', 'slug', 'order', 'body', 'keywords', 'publish'];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
