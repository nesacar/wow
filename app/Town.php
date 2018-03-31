<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';

    protected $fillable = ['id', 'name', 'slug', 'order', 'body', 'keywords', 'publish'];

    public static function changeLinksByTown($town_id){
        $posts = Post::where('town_id', $town_id)->get();
        if(count($posts)>0){
            foreach ($posts as $post){
                Post::fixLinks($post);
            }
        }
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
