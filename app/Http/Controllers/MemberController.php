<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    
    public function __construct(){
    	$this->middleware('auth')->except('show');
    }
    
    public function show ($slug) {
	    $user = User::whereSlug($slug)->first();
	    if ($user) {
	    	return view('user.show', compact('user'));
	    }
	    return redirect()->back();
	}

	public function edit_name (Request $request, $slug) {
		$user = User::whereSlug($slug)->first();
		$slug = str_slug($request->name);
	    if (Auth::user()->id == $user->id) {
	    	$chekSlug = User::whereSlug($slug)->get();
	    	if ($chekSlug->count() > 0) {
	    		if ($chekSlug[0]->slug != $user->slug) {
					$slug = $slug.'-'.date('His');
	    		}
	    	}
	    	$user->update([
	    		'name' => $request->name,
	    		'slug' => $slug,
	    	]);
	    }
	    return redirect()->route('user.show',['user' => $user->slug]);
	}

	public function edit_img (Request $request, $slug) {
		$this->validate($request, [
            'img' => 'required|max:2000|mimes:jpeg,jpg,bmp,png,gif',
        ]);
		$user  = User::whereSlug($slug)->first();
		if (! is_null($user->img)) {
			Storage::disk('local')->delete('public/user/'.$user->img);
		}
		$image = $request->file('img');
	    if (Auth::user()->id == $user->id) {
	    	$ex      = $image->getClientOriginalExtension();
            $imgName = $user->slug.'-'.date("YmdHis").'.'.$ex;
            $img     = Image::make($image)->resize(null, 350, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode($ex);
            Storage::put('public/user/'.$imgName, $img->__toString());
            $user->update([
            	'img' => $imgName,
            ]);
	    }
	    return redirect()->back();
	}

}
