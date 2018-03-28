<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Post;
use App\Theme;
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
        $sliders = Post::getSlider();
        $posts = Post::getLatest(0,20);
        $highlights = Post::getHighlights();
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);
        return view('themes.'.$theme.'.pages.home', compact('theme', 'posts', 'sliders', 'highlights', 'mobile'));
    }

    public function widget(){
        $theme = Theme::getTheme();
        $posts = Post::getWidget(6);
        return view('themes.'.$theme.'.pages.widget', compact('theme', 'posts'));
    }

    public function proba(){
        //factory('App\Post', 300)->create();
    }
}
