<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Click;
use App\Http\Requests\SubscribeNewsletterRequest;
use App\Newsletter;
use App\Post;
use App\Setting;
use App\Statistic;
use App\Subscriber;
use App\Tag;
use App\Theme;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use File;

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
        $home = true;
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);
        return view('themes.'.$theme.'.pages.home', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'home'));
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
        if(empty($category)){
            $category = null;
            $town = Town::where('slug', $slug)->first();
            $sliders = Post::getSliderByTown($town->id);
            $posts = Post::getLatestByTown(20,$town->id);
            $top = Post::getTopByTown(8, $town->id);
            $highlights = Post::getHighlights();
            $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

            return view('themes.'.$theme.'.pages.town', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'category', 'town'));
        }else{
            $town = null;
            $sliders = Post::getSlider($category->id);
            $posts = Post::getLatest($category->id,20);
            $top = Post::getTop($category->id);
            $highlights = Post::getHighlights($category->id);
            $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

            return view('themes.'.$theme.'.pages.category', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'category', 'town'));
        }
    }

    public function subCategory($slug1, $slug2){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $post = Post::where('slug', $slug2)->first();
        if(empty($post)){
            $category = Category::where('slug', $slug1)->first();
            $town = Town::where('slug', $slug2)->first();
            $sliders = Post::getSlider($category->id, $town->id);
            $posts = Post::getLatest($category->id,20, $town->id);
            $highlights = Post::getHighlights($category->id);
            $top = Post::getTop($category->id, $town->id);
            $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

            return view('themes.'.$theme.'.pages.category', compact('theme', 'posts', 'sliders', 'highlights', 'mobile', 'top', 'settings', 'category', 'town'));
        }else{
            $category = Category::where('slug', $slug1)->first();
            $post = Post::where('slug', $slug2)->first();
            if(empty($post)) return 'error 404';
            $photos = $post->photo;
            $tags = $post->tag;
            $highlights = Post::getHighlights($category->id);
            $top = Post::getTop($category->id);
            $related = Post::getRelated($category->id, $post->id, 10);
            $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

            if(request('email') && request('news')){
                $newsletter = Newsletter::where('verification', request('news'))->first();
                $subscriber = Subscriber::where('verification', request('email'))->first();
                if(isset($newsletter) && isset($subscriber)){
                    Click::insertClick($newsletter->id, $post->id, false, $subscriber->id);
                }
            }

            return view('themes.'.$theme.'.pages.post', compact('theme', 'photos', 'highlights', 'mobile', 'top', 'settings', 'category', 'post', 'tags', 'related', 'town'));
        }
    }

    public function post($slug1, $slug2, $slug3){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $category = Category::where('slug', $slug1)->first();
        $town = Town::where('slug', $slug2)->first();
        $post = Post::where('slug', $slug3)->first();
        if(empty($post)) return 'error 404';
        $photos = $post->photo;
        $tags = $post->tag;
        $highlights = Post::getHighlights($category->id);
        $top = Post::getTop($category->id);
        $related = Post::getRelated($category->id, $post->id, 10);
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

        if(request('email') && request('news')){
            $newsletter = Newsletter::where('verification', request('news'))->first();
            $subscriber = Subscriber::where('verification', request('email'))->first();
            if(isset($newsletter) && isset($subscriber)){
                Click::insertClick($newsletter->id, $post->id, false, $subscriber->id);
            }
        }

        return view('themes.'.$theme.'.pages.post', compact('theme', 'photos', 'highlights', 'mobile', 'top', 'settings', 'category', 'post', 'tags', 'related', 'town'));
    }

    public function scroll_related(Request $request){
        $theme = Theme::getTheme();
        $category = Category::find(request('category'));
        $related = Post::getRelated(request('category'), request('exclude'), 10);
        return view('themes.'.$theme.'.partials.related-append', compact('theme', 'related', 'category'));
    }

    public function tag($slug){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $tag = Tag::where('slug', $slug)->first();
        if(empty($tag)) return 'error 404';
        $posts = Post::getPostsByTag($tag);
        $top = Post::getTop();
        $highlights = Post::getHighlights();
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

        return view('themes.'.$theme.'.pages.tag', compact('theme', 'posts', 'highlights', 'mobile', 'top', 'settings', 'mobile'));
    }

    public function search(Request $request){
        $theme = Theme::getTheme();
        $settings = Setting::find(1);
        $posts = Post::search($request);
        $top = Post::getTop();
        $highlights = Post::getHighlights();
        $mobile = Banner::isMobile($_SERVER['HTTP_USER_AGENT']);

        return view('themes.'.$theme.'.pages.search', compact('theme', 'posts', 'highlights', 'mobile', 'top', 'settings', 'mobile'));
    }

    public function subscribe(SubscribeNewsletterRequest $request){
        $subscriber = new Subscriber();
        $subscriber->email = request('email');
        $subscriber->verification = str_random(20);
        $subscriber->save();
        return redirect('/');
    }

    public function unSubscribe($verification){
        $subscriber = Subscriber::where('verification', $verification)->first();
        $subscriber->block = 1;
        $subscriber->update();

        return redirect('/')->with('done', 'You have successfully unsubscribed.');
    }

    public function proba(){
//        factory('App\Post', 300)->create();
//        $posts = Post::where('link', null)->get();
//        foreach ($posts as $post){
//            Post::fixLinks($post);
//        }
//        factory('App\Click', 300)->create();
//        return 'done';
//        $posts = Post::all();
//        foreach ($posts as $post){
//            $post->publish_at = Carbon::now();
//            $post->update();
//        }

//        Artisan::call('queue:work', [
//            '--tries' => 3
//        ]);

        //Artisan::call('queue:stop');
//        $posts = Post::where('id', '<', 302)->latest()->get();
//        if(count($posts)>0){
//            foreach ($posts as $post){
//                if($post->image) File::delete($post->image);
//                $post->delete();
//            }
//        }
        return 'done2';
    }
}
