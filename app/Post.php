<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'title', 'slug', 'short', 'body', 'image', 'publish', 'publish_at'];

    public static function base64UploadImage($post_id, $image){
        $post = self::find($post_id);
        if($post->image != null){
            File::delete($post->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $post->id . '.jpg';
        $path = public_path('uploads/posts/');
        file_put_contents($path . $filename, $data);
        $post->image = 'uploads/posts/' . $filename;
        $post->update();
        return $post->image;
    }

    public static function getPostLink($post){
        $category = Category::find($post->category_id);
        return url($category->slug . '/' . $post->slug . '/' . $post->id);
    }

    /**
     * Scope a query to only include publish posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublish($query)
    {
        return $query->where('publish', 1);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }

    public function photo(){
        return $this->hasMany(Photo::class);
    }

    public function newsletter(){
        return $this->belongsToMany(Newsletter::class);
    }
}
