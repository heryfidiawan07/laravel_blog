<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function __construct(){
    	return $this->middleware('auth');
    }
    
    public function store (Request $request, $post_id) {
    	$this->validate($request, [
    		'body' => 'required',
    	]);
    	$post = Post::findOrFail($post_id);
    	if ($post) {
    		$post->comments()->create([
    			'body' => $request->body,
    			'user_id' => Auth::user()->id,
    		]);
    	}
    	return redirect()->back();
    }
    
    public function store_parent (Request $request, $comment_id) {
    	$this->validate($request, [
    		'body_parent' => 'required',
    	]);
    	$comment = Comment::findOrFail($comment_id);
    	$post    = Post::findOrFail($comment->commentable->id);
    	if ($comment) {
    		$post->comments()->create([
    			'body' => $request->body_parent,
    			'parent_id' => $comment->id,
    			'user_id' => Auth::user()->id,
    		]);
    	}
    	return redirect()->back();
    }
    
    public function update (Request $request, $comment_id){
    	$this->validate($request, [
    		'body_update' => 'required',
    	]);
    	$comment = Comment::findOrFail($comment_id);
    	if ($comment) {
    		Auth::user()->comments()->whereId($comment_id)->update([
    			'body' => $request->body_update,
    		]);
    	}
    	return redirect()->back();
    }

}
