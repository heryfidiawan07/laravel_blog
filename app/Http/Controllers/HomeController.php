<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Menu;
use App\Post;
use App\User;
use App\Comment;
use App\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {	
    	// Popular post count counter
        $parent   = Post::whereStatus(1)->whereHas('menu', function ($query) {
                    	$query->where('status', 1);
                	})->has('comments')->orderBy('counter', 'DESC')->first();
        // Popular post count counter number 2 -> ...
        $childs   = Post::whereStatus(1)->whereHas('menu', function ($query) {
                    	$query->where('status', 1);
                	})->has('comments')->orderBy('counter', 'DESC')->take(5)->get();
        $news     = Post::whereStatus(1)->whereHas('menu', function ($query) {
                    	$query->where('status', 1);
                	})->latest()->take(6)->get();
        $sticky   = Post::where([
        				['status', 1], ['sticky', 1]
        			])->whereHas('menu', function ($query) {
                    	$query->where('status', 1);
                	})->latest()->take(5)->get();
		// Post with most comment
		$popularComments = Post::get()->sortByDesc(function ($query) {
								return $query->comments->count();
							})->take(5);
		// Latest Comment user
       	$userComments    = Comment::with('user')->with('commentable')->latest()->take(10)->get();
        return view('home', compact('parent','childs','news','sticky','popularComments', 'userComments'));
    }

    public function menu ($slug) {
    	$menu  = Menu::whereSlug($slug)->first();
    	if ($menu->status == 1) {
	    	$posts = $menu->posts()->whereStatus(1)->latest()->paginate(12);
	    	return view('post.index', ['posts' => $posts, 'data' => $menu]);
    	}
    	return redirect()->back();
    }
    
    public function category ($slug) {
    	$category = Category::whereSlug($slug)->first();
    	if ($category) {
	    	$posts = $category->posts()->whereHas('menu', function ($query) {
			    		$query->where('status',1);
			    	})->whereStatus(1)->latest()->paginate(12);
	    	return view('post.index', ['posts' => $posts, 'data' => $category]);
    	}
    	return redirect()->back();
    }

    public function tag ($slug) {
    	$tag = Tag::whereSlug($slug)->first();
    	if ($tag) {
	    	$posts = $tag->posts()->whereHas('menu', function ($query) {
			    		$query->where('status',1);
			    	})->whereStatus(1)->latest()->paginate(12);
	    	return view('post.index', ['posts' => $posts, 'data' => $tag]);
    	}
    	return redirect()->back();
    }

}
