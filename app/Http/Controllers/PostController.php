<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Purifier;

use App\User;
use App\Tag;
use App\Menu;
use App\Post;
use App\Comment;
use App\Picture;
use App\Category;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin')->except('show');
        // $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index()
    {
        $posts = Post::orderBy('sticky','DESC')->orderBy('created_at','DESC')->paginate(20);
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {   
    	$menus 		= Menu::has('childs',0)->get();
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.post.create', compact('menus', 'tags', 'categories'));
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'title' => 'required|min:3|max:200|unique:posts',
            'body' => 'required',
            'menu_id' => 'required',
            'status' => 'required',
            'sticky' => 'required',
            'comment' => 'required',
        ]);
        $post = Post::create([
            'title' => $request->title,
            'menu_id' => $request->menu_id,
            'slug' => str_slug($request->title),
            'summary' => str_limit(strip_tags($request->body),145),
            'body' => Purifier::clean($request->body, array(
                        'CSS.AllowTricky' => true , 
                        'HTML.SafeIframe' => true , 
                        "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"
                    )),
            'status' => $request->status,
            'sticky' => $request->sticky,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
        ]);

        if ($post) {
        	$this->validate($request, [
                'img.*' => 'required|mimes:jpeg,jpg,bmp,png,gif',
            ]);
            if ($request->hasFile('img')) {
            	$pictures = $request->file('img');
                foreach ($pictures as $key => $pict) {
                    $ex      = $pict->getClientOriginalExtension();
                    $imgName = $post->slug.'-'.date("YmdHis").'-'.$key.'.'.$ex;
                    $img     = Image::make($pict)->resize(null, 650, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->encode($ex);
                    $thumb   = Image::make($pict)->resize(200, 200)->encode($ex);
                    Storage::put('public/post/img/'.$imgName, $img->__toString());//Laravel Storage
                    Storage::put('public/post/thumb/'.$imgName, $thumb->__toString());//Laravel Storage
                    // Storage::disk('dropbox')->putFileAs('/public/post/img/', $pict, $imgName);//OK Dropbox
                    // Storage::disk('dropbox')->putFileAs('/public/post/thumb/', $pict, $imgName);//OK Dropbox
                    // Storage::disk('dropbox')->put('/public/post/img/'.$imgName, $img->__toString());//OK Dropbox with resize
                    // Storage::disk('dropbox')->put('/public/post/thumb/'.$imgName, $thumb->__toString());//OK Dropbox with resize
                    // $this->dropbox->createSharedLinkWithSettings('/public/post/img/'.$imgName);
                    // $this->dropbox->createSharedLinkWithSettings('/public/post/thumb/'.$imgName);
                    $post->pictures()->create([
                        'img' => $imgName, 'main' => 0, 'user_id' => Auth::user()->id,
                    ]);
                }
            }
        	if (!empty($request->categories)) {
        		$post->categories()->attach($request->categories);
        	}
        	if (!empty($request->tags)) {
        		$post->tags()->attach($request->tags);
        	}
        }
        return redirect()->route('post.index');
    }

    public function edit($id)
    {   
        $post       = Post::findOrFail($id);
        $menus      = Menu::has('childs',0)->get();
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.post.edit', compact('post', 'menus', 'tags', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:200|unique:posts,title,' . $id,
            'body' => 'required',
            'menu_id' => 'required',
            'status' => 'required',
            'sticky' => 'required',
            'comment' => 'required',
        ]);
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'menu_id' => $request->menu_id,
            'slug' => str_slug($request->title),
            'summary' => str_limit(strip_tags($request->body),145),
            'body' => Purifier::clean($request->body, array(
                        'CSS.AllowTricky' => true , 
                        'HTML.SafeIframe' => true , 
                        "URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"
                    )),
            'status' => $request->status,
            'sticky' => $request->sticky,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
        ]);

        if ($post) {
            $pictures = $request->file('img');
            if (!empty($pictures)) {
                $this->validate($request, [
                    'img.*' => 'required|mimes:jpeg,jpg,bmp,png,gif',
                ]);
                foreach ($pictures as $key => $pict) {
                    $ex      = $pict->getClientOriginalExtension();
                    $imgName = str_slug($request->title).'-'.date("YmdHis").'-'.$key.'.'.$ex;
                    $img     = Image::make($pict)->resize(null, 650, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->encode($ex);
                    $thumb   = Image::make($pict)->resize(200, 200)->encode($ex);
                    Storage::put('public/post/img/'.$imgName, $img->__toString());
                    Storage::put('public/post/thumb/'.$imgName, $thumb->__toString());

                    // Storage::disk('dropbox')->put('/public/post/img/'.$imgName, $img->__toString());//OK Dropbox with resize
                    // Storage::disk('dropbox')->put('/public/post/thumb/'.$imgName, $thumb->__toString());//OK Dropbox with resize
                    // $this->dropbox->createSharedLinkWithSettings('/public/post/img/'.$imgName);
                    // $this->dropbox->createSharedLinkWithSettings('/public/post/thumb/'.$imgName);

                    $post->pictures()->create([
                        'img' => $imgName, 'main' => 0, 'user_id' => Auth::user()->id,
                    ]);
                }
            }
            if (!empty($request->categories)) {
                $post->categories()->sync($request->categories);
            }
            if (!empty($request->tags)) {
                $post->tags()->sync($request->tags);
            }
        }
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
        	if ($post->pictures()->count()) {
        		foreach ($post->pictures as $pict) {
        			Storage::disk('local')->delete('public/post/img/'.$pict->img);
        			Storage::disk('local')->delete('public/post/thumb/'.$pict->img);
        			// Storage::disk('dropbox')->delete('/public/post/img/' . $pict->img);//OK Dropbox delete
           			// Storage::disk('dropbox')->delete('/public/post/thumb/' . $pict->img);//OK Dropbox delete
        		}
        	}
        	if ($post->categories()->count()) {
        		$post->categories()->detach();
        	}
        	if ($post->tags()->count()) {
        		$post->tags()->detach();
        	}
        	$post->delete();
        }
        return redirect()->back();
    }

    public function show($slug)
    {
        $post  	  = Post::where([['slug', $slug ],['status', 1]])->whereHas('menu', function ($query) {
			    		$query->where('status',1);
			    	})->first();
        // Post with most comment
		$popularComments = Post::get()->sortByDesc(function ($query) {
								return $query->comments->count();
							})->take(5);
		// Latest Comment user
       	$userComments    = Comment::with('user')->with('commentable')->latest()->take(10)->get();

        if ($post) {
        	$post->update(['counter' => $post->counter+1]);
        	return view('post.show', compact('post','popularComments','userComments'));
        }
        return redirect()->back();
    }

    // public function dataTables(){
    // 	$post = Post::query();
    // 	return DataTables::of($post)
    // 		->addColumn('action', function ($post) {
    // 			return view('admin.post.action', [
    // 				'post' => $post,
    // 				'post_show' => route('post.show', $post->menu->slug),
    // 				'post_edit' => route('post.edit', $post->id),
    // 			]);
    // 		})
    // 		->addColumn('menu', function ($post) {
    // 			return $post->menu->name;
    // 		})
    // 		->addColumn('status', function ($post) {
    // 			if ($post->status == 0) {
    // 				return '<span class="text-danger">Draft</span>';
    // 			}else {
    // 				return '<span class="text-success">Active</span>';
    // 			}
    // 		})
    // 		->addIndexColumn()
    // 		->rawColumns(['action','status'])//Merender html
    // 		->make(true);
    // }

}
