<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostLangRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UploadGalleryRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::select('posts.id', 'posts.title', 'posts.publish', 'posts.created_at', 'categories.title as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->orderBy('posts.id', 'DESC')->groupBy('posts.id')->paginate(50);

        return response()->json([
            'posts' => $posts,
        ]);
    }

    public function store(CreatePostRequest $request){
        $post = Post::create(request()->all());
        request('slug')? $post->slug = str_slug(request('slug')) : $post->slug = str_slug(request('title'));
        $post->slider = request('slider')?  true : false;
        $post->publish = request('publish')?  true : false;
        $post->update();
        if(request('image')){ Post::base64UploadImage($post->id, request('image')); }

        return response()->json([
            'post' => $post
        ]);
    }

    public function show($id){
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ]);
    }

    public function update(UpdatePostLangRequest $request, $id){
        $post = Post::find($id);
        $post->update(request()->all());
        request('slug')? $post->slug = str_slug(request('slug')) : $post->slug = str_slug(request('title'));
        $post->slider = request('slider')?  true : false;
        $post->publish = request('publish')?  true : false;
        $post->update($request->except('image', 'slug'));
        return response()->json([
            'post' => $post
        ]);
    }

    public function destroy($id){
        $post = Post::find($id);
        if(!empty($post->image)) File::delete($post->image);
        Post::destroy($post->id);
        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage(UploadGalleryRequest $request, $id){
        $post = Post::find($id);
        if(!empty($post->image)) File::delete($post->image);
        $image = Post::base64UploadImage($id, request('file'));
        return response()->json([
            'image' => $image
        ]);
    }

    public function galleryUpdate($id){
        Photo::saveImage($id, request('file'));
        return 'done';
    }

    public function gallery($id){
        $photos = Post::find($id)->photo;
        return response()->json([
            'photos' => $photos
        ]);
    }

    public function search(){
        $category = request('list');
        $text = request('text');
        $posts = Post::select('posts.id', 'posts.title', 'posts.publish', 'posts.created_at', 'categories.title as category')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where(function ($query) use ($category){
                if($category > 0){
                    $query->where('posts.category_id', $category);
                }
            })
            ->where(function ($query) use ($text){
                if($text != ''){
                    $query->where('posts.title', 'like', '%'.$text.'%')->orWhere('posts.title', 'like', '%'.$text.'%');
                }
            })
            ->orderBy('posts.created_at', 'DESC')->groupBy('posts.id')->paginate(50);
        return response()->json([
            'posts' => $posts,
        ]);
    }

    public function lists(){
        $posts = Post::select('id', 'title', 'short', 'image')->where('publish', 1)->orderBy('created_at', 'DESC')->get();

        return response()->json([
            'posts' => $posts,
        ]);
    }
}
