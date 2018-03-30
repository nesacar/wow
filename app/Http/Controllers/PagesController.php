<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Post;
use App\Setting;
use App\Theme;
use App\Town;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $sliders = Post::getSlider();
        $posts = Post::getLatest(0,20);
        $highlights = Post::getHighlights();
        $top = Post::getTop();
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);
        return view('themes.'.$theme.'.pages.home', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings'));
    }

    public function widget(){
        $theme = Theme::getTheme();
        $posts = Post::getWidget(6);
        return view('themes.'.$theme.'.pages.widget', compact('theme', 'posts'));
    }

    public function category($slug){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $category = Category::where('slug', $slug)->first();
        if(empty($category)) $category = Town::where('slug', $slug)->first();
        $sliders = Post::getSlider($category->id);
        $posts = Post::getLatest($category->id,20);
        $highlights = Post::getHighlights($category->id);
        $top = Post::getTop($category->id);
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

        return view('themes.'.$theme.'.pages.category', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'category'));
    }

    public function subCategory($slug1, $slug2){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $category = Category::where('slug', $slug1)->first();
        $town = Town::where('slug', $slug2)->first();
        $sliders = Post::getSlider($category->id, $town->id);
        $posts = Post::getLatest($category->id,20, $town->id);
        $highlights = Post::getHighlights($category->id);
        $top = Post::getTop($category->id, $town->id);
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

        return view('themes.'.$theme.'.pages.category', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'category', 'town'));
    }

    public function proba(){
        //factory('App\Post', 300)->create();
//        $posts = Post::all();
//        foreach ($posts as $post){
//            Post::fixLinks($post);
//        }
//        return 'done';
    }
}
