<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;
use Illuminate\Http\Request;

class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = ['id', 'user_id', 'category_id', 'town_id', 'title', 'slug', 'short', 'body', 'image', 'link', 'views', 'publish', 'slider', 'widget', 'map', 'publish_at'];

    public static function base64UploadImage($post_id, $image){
        $post = self::find($post_id);
        if($post->image != null) File::delete($post->image);

        $exploaded = explode(',', $image);
        $data = base64_decode($exploaded[1]);
        $filename = $post->slug . '-' . str_random(2) . $post->id . '.jpg';
        $path = public_path('uploads/posts/');
        file_put_contents($path . $filename, $data);
        $post->image = 'uploads/posts/' . $filename;
        $post->update();

//        File::copy(public_path($post->image), public_path($post->sliderImage));
//
//        self::cropImage($post->sliderImage, 480, 250);

        return $post->image;
    }

    public static function cropImage($image, $width, $height){
        \Image::make($image)->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image);
    }

    public static function getSlider($cat_id=0, $town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publish', 1)
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })
            ->where(function($query) use($town_id){
                if($town_id){
                    $query->where('posts.town_id', $town_id);
                }
            })
            ->where('posts.slider', 1)->orderBy('posts.publish_at', 'DESC')->take(6)->get();
    }

    public static function getSliderByTown($town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at')
            ->where('posts.publish', 1)
            ->where(function($query) use($town_id){
                if($town_id){
                    $query->where('posts.town_id', $town_id);
                }
            })
            ->where('posts.slider', 1)->orderBy('posts.publish_at', 'DESC')->take(6)->get();
    }

    public static function getHighlights($cat_id=0, $town_id=false){
        $categories = Category::where('featured', '>', 0)->where('id', '<>', $cat_id)->orderBy('featured', 'ASC')->take(3)->get();
        foreach ($categories as $category){
            $category['posts'] = self::getLatest($category->id, 5, $town_id);
        }
        return $categories;
    }

    public static function getLatest($cat_id=0, $limit=5, $town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })
            ->where(function($query) use($town_id){
                if($town_id){
                    $query->where('posts.town_id', $town_id);
                }
            })->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC')->paginate($limit);
    }

    public static function getLatestByTown($limit=5, $town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at')
            ->where(function($query) use($town_id){
                if($town_id){
                    $query->where('posts.town_id', $town_id);
                }
            })->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC')->paginate($limit);
    }

    public static function getRandom($cat_id=0, $limit=5){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })->where('posts.publish', 1)->orderByRand()->take($limit)->get();
    }

    public function scopePublish($query)
    {
        return $query->where('publish', 1);
    }

    public static function getWidget($limit){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.publish', 1)->where('posts.widget', 1)->orderBy('posts.publish_at', 'DESC')->take($limit)->get();
    }

    public static function getTop($cat_id=0, $limit=8, $town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use ($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })
            ->where(function($query) use ($town_id){
                if($town_id > 0){
                    $query->where('posts.town_id', $town_id);
                }
            })
            ->where('posts.publish', 1)->orderBy('posts.views', 'ASC')->take($limit)->get();
    }

    public static function getTopByTown($limit=8, $town_id=false){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at')
            ->where(function($query) use ($town_id){
                if($town_id > 0){
                    $query->where('posts.town_id', $town_id);
                }
            })
            ->where('posts.publish', 1)->orderBy('posts.views', 'ASC')->take($limit)->get();
    }

    public static function fixLinks($post){
        $category = Category::find($post->category_id);

        if(empty($category)){
            $post->link = null;
            $post->category_id = 0;
            $post->publish = 0;
        }else{
            if($post->town_id != null && $post->town_id > 0){
                $town = Town::find($post->town_id);
                if(empty($town)){
                    $post->link = $category->slug . '/' . $post->slug;
                    $post->town_id = 0;
                }else{
                    $post->link = $category->slug . '/' . $town->slug . '/' . $post->slug;
                }
            }else{
                $post->link = $category->slug . '/' . $post->slug;
            }
        }

        $post->update();
    }

    public static function getRelated($cat_id, $exclude_id, $limit){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function($query) use($cat_id){
                if($cat_id > 0){
                    $query->where('categories.id', $cat_id);
                }
            })
            ->where('posts.id', '<>', $exclude_id)->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC')->paginate($limit);
    }

    public static function getPostsByTag($tag, $limit=20){
        return self::select('posts.id', 'posts.title', 'posts.slug', 'posts.image', 'posts.short', 'posts.link', 'posts.publish_at', 'categories.slug as category', 'categories.title as categoryTitle')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->where('post_tag.tag_id', $tag->id)->where('posts.publish', 1)->orderBy('posts.publish_at', 'DESC')->paginate($limit);
    }

    public static function search(Request $request){
        return self::where('publish', 1)->where('publish_at', '<=', (new \Carbon\Carbon()))->where(function ($q) use($request) {
            $q->where('title', 'like', '%' . $request->input('text') . '%')
                ->orWhere('slug', 'like', '%' . $request->input('text') . '%')
                ->orWhere('short', 'like', '%' . $request->input('text') . '%');
        })->orderby('publish_at', 'DESC')->take(20)->get();
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
