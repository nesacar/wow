<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'title', 'slug', 'short', 'order', 'featured', 'parent', 'level', 'image', 'publish'];

    public static function base64UploadImage($category_id, $image){
        $category = self::find($category_id);
        if($category->image != null){
            File::delete($category->image);
        }
        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = time() . '-' . $category->id . '.jpg';
        $path = public_path('uploads/categories/');
        file_put_contents($path . $filename, $data);
        $category->image = 'uploads/categories/' . $filename;
        $category->update();
        return $category->image;
    }

    public static function changeLinksByCategory($category_id){
        $posts = Post::where('category_id', $category_id)->get();
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
