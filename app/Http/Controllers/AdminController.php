<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Post;
use App\Message;
use App\Comment;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }
    
    public function dashboard () {
    	$users = User::all();
    	$posts = Post::all();
    	$messages = Message::all();
    	$comments = Comment::all();
    	$counter  = '';
    	if ($posts->count()) {
	    	$counter  = Post::selectRaw("year(created_at) year, month(created_at) month, sum(counter) data")
						->groupBy('year','month')
						->orderBy('year','DESC')
						->orderBy('month','DESC')
						->take(12)
						->get();
    	}
    	return view('admin.dashboard', compact('users','posts','messages','comments','counter'));
    }

}
