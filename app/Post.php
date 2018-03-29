<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'town_id', 'title', 'slug', 'short', 'body', 'image', 'sliderImage', 'publish', 'slider', 'widget', 'publish_at'];

    public static function base64UploadImage($post_id, $image){
        $post = self::find($post_id);
        if($post->image != null) File::delete($post->image);
        if($post->sliderImage != null) File::delete($post->sliderImage);

        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = $post->slug . '-' . str_random(2) . $post->id . '.jpg';
        $filename = $post->slug . '-' . str_random(2) . $post->id . '.jpg';
        $path = public_path('uploads/posts/');
        file_put_contents($path . $filename, $data);
        $post->image = 'uploads/posts/' . $filename;
        $post->sliderImage = 'uploads/posts/slider/' . $filename;
        $post->update();

        File::copy(public_path($post->image), public_path($post->sliderImage));

        self::cropImage($post->sliderImage, 480, 250);

        return $post->image;
    }

    public static function getPostLink($post){
        $category = Category::find($post->category_id);
        return url($category->slug . '/' . $post->slug . '/' . $post->id);
    }

    public static function cropImage($image, $width, $height){
        \Image::make($image)->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image);
    }

    public static function getSlider($cat_id=0){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.sliderImage', 'posts.short', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publish', 1)
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })
            ->where('posts.slider', 1)->orderBy('posts.publish_at', 'DESC')->take(6)->get();
    }

    public static function getHighlights($cat_id=0){
        $categories = Category::where('featured', '>', 0)->where('id', '<>', $cat_id)->orderBy('featured', 'ASC')->take(3)->get();
        foreach ($categories as $category){
            $category['posts'] = self::getLatest($category->id, 5);
        }
        return $categories;
    }

    public static function getLatest($cat_id=0, $limit=5){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC')->take($limit)->get();
    }

    public static function getRandom($cat_id=0, $limit=5){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })->where('posts.publish', 1)->orderByRand()->take($limit)->get();
    }

    public static function link($post){

    }

    public function scopePublish($query)
    {
        return $query->where('publish', 1);
    }

    public static function getWidget($limit){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publish', 1)->where('posts.widget', 1)->orderBy('posts.publish_at', 'DESC')->take($limit)->get();
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

    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
