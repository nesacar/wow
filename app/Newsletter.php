<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'newsletters';

    protected $fillable = ['title', 'verification', 'received', 'skip', 'send', 'active', 'last_send'];

    public function post(){
        return $this->belongsToMany(Post::class);
    }

    public function banner(){
        return $this->belongsToMany(Banner::class);
    }
}
