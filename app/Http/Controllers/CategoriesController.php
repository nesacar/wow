<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Post;
use Illuminate\Http\Request;
use File;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::select('id', 'title', 'publish', 'created_at')->orderBy('order', 'ASC')->paginate(50);

        return response()->json([
            'categories' => $categories,
        ]);
    }

    public function store(CreateCategoryRequest $request){
        $category = new Category();
        $category->title = request('title');
        request('slug')? $category->slug = str_slug(request('slug')) : $category->slug = str_slug(request('title'));
        $category->short = request('short');
        $category->order = request('order');
        request('publish')? $category->publish = true : $category->publish = false;
        $category->map = request('map');
        $category->save();

        return response()->json([
            'category' => $category
        ]);
    }

    public function show($id){
        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ]);
    }

    public function update(CreateCategoryRequest $request, $id){
        $category = Category::find($id);
        $oldSlug = $category->slug;
        $category->update(request()->all());
        request('slug')? $category->slug = str_slug(request('slug')) : $category->slug = str_slug(request('title'));
        request('publish')? $category->publish = true : $category->publish = false;
        $category->map = request('map');
        $category->update($request->except('image', 'slug'));

        if($oldSlug != request('slug')) Category::changeLinksByCategory($category->id);

        return response()->json([
            'category' => $category
        ]);
    }

    public function destroy($id){
        $category = Category::find($id);
        $posts = Post::where('category_id', $category->id)->get();
        if(!empty($category->image)) File::delete($category->image);
        Category::destroy($category->id);

        if(count($posts)>0){
            foreach ($posts as $post){
                Post::fixLinks($post);
            }
        }

        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function uploadImage($id){
        $image = Category::base64UploadImage($id, request('image'));
        return response()->json([
            'image' => $image
        ]);
    }

    public function lists(){
        $categories = Category::where('publish', 1)->orderBy('title', 'ASC')->pluck('title', 'id')->prepend('Without category', 0);
        return response()->json([
            'categories' => $categories
        ]);
    }
}
