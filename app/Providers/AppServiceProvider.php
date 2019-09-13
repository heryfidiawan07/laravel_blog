<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Schema;

use App\Tag;
use App\Menu;
use App\Page;
use App\Share;
use App\Banner;
use App\Follow;
use App\Category;
use App\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        // Force SSL in production
		if ($this->app->environment() == 'production') {
		    URL::forceScheme('https');
		}
     	if (! $this->app->runningInConsole()) {
	        // App is not running in CLI context
	        $footTags   	= Tag::all();
	        $share 			= Share::all();
	        $follow 		= Follow::all();
	        $banners 		= Banner::all();
	        $footCats   	= Category::all();
	        $app   			= Application::first();
	        $tags  			= Tag::where('menu_type',1)->get();
	        $categories 	= Category::where('menu_type',1)->get();
	        $pages 			= Page::where('privacy_policy',0)->get();
	        $menus 			= Menu::has('parent',0)->whereStatus(1)->get();
	        $privacy_policy = Page::where('privacy_policy',1)->first();
	        View::share([
	        	'app'	     => $app,
	        	'tags' 		 => $tags,
	        	'menus' 	 => $menus,
	        	'pages' 	 => $pages,
	        	'share' 	 => $share,
	        	'follow' 	 => $follow,
	        	'categories' => $categories,
	        	'footTags' 	 => $footTags,
	        	'footCats' 	 => $footCats,
	        	'banners' 	 => $banners,
	        	'privacy_policy' => $privacy_policy,
	        ]);
	    }

    }
}
