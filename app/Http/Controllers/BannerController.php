<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Banner;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function __construct(){
		$this->middleware('admin');
	}
	    
    public function index()
    {	
    	$banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function store(Request $request)
    {	
    	$pictures = $request->file('img');
    	if (!empty($pictures)) {
    		$this->validate($request, [
                    'img.*' => 'required|mimes:jpeg,jpg,bmp,png,gif',
                ]);	
    		foreach ($pictures as $key => $pict) {
                $ex      = $pict->getClientOriginalExtension();
                $imgName = date("YmdHis").'-'.$key.'.'.$ex;
                $img     = Image::make($pict)->resize(1115, 141)->encode($ex);
                Storage::put('public/banner/'.$imgName, $img->__toString());
                Auth::user()->banners()->createMany([
                	['img' => $imgName]
                ]);
			}
    	}
        return redirect()->back();
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
    		Storage::disk('local')->delete('public/banner/'.$banner->img);
        	$banner->delete();
        }
        return redirect()->back();
    }

}
