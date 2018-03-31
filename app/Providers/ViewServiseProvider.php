<?php

namespace App\Providers;

use App\Category;
use App\Theme;
use App\Town;
use Illuminate\Support\ServiceProvider;

class ViewServiseProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composerDesktopMenu();
        $this->composerMobileMenu();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composerDesktopMenu(){
        $theme = Theme::getTheme();
        $cats = Category::where('publish', 1)->orderBy('order', 'ASC')->get();
        $towns = Town::where('publish', 1)->orderBy('order', 'ASC')->get();
        view()->composer('themes.'.$theme.'.partials.nav', function($view) use ($cats, $towns){
            $view->with('cats', $cats)->with('towns', $towns);
        });
    }

    private function composerMobileMenu(){
        $theme = Theme::getTheme();
        $cats = Category::where('publish', 1)->orderBy('order', 'ASC')->get();
        view()->composer('themes.'.$theme.'.partials.nav-sidebar', function($view) use ($cats){
            $view->with('cats', $cats);
        });
    }
}