<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\User;
use App\Application;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AppController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }
    
    public function index () {
    	$app = Application::first();
    	return view('admin.app.index', compact('app'));
    }
    
    public function store (Request $request) {
    	$this->validate($request, [
    		'app_name' => 'max:50',
    		'title' => 'max:100',
    		'description' => 'max:150',
    		'author' => 'max:50',
    		'company' => 'max:50',
    		'email' => 'max:50',
    		'phone' => 'max:12',
    		'fax' => 'max:20',
    		'address' => 'max:100',
    	]);
    	$imgName = null;
    	$img 	 = $request->file('img');
    	if (!empty($img)) {
	    	$ex      = $img->getClientOriginalExtension();
	        $imgName = str_slug($request->app_name).'-'.date("YmdHis").'.'.$ex;
	        $img     = Image::make($img)->resize(null, 650, function ($constraint) {
	                        $constraint->aspectRatio();
	                    })->encode($ex);
	        $thumb   = Image::make($img)->resize(200, 200)->encode($ex);
	        Storage::put('public/app/img/'.$imgName, $img->__toString());
	        Storage::put('public/app/thumb/'.$imgName, $thumb->__toString());
    	}
        Application::create([
        	'img' => $imgName,
            'app_name' => $request->app_name,
    		'title' => $request->title,
    		'description' => $request->description,
    		'author' => $request->author,
    		'company' => $request->company,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'fax' => $request->fax,
    		'address' => $request->address,
    		'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('app.index');
    }
    
    public function update (Request $request, $id) {
    	$this->validate($request, [
    		'app_name' => 'max:50',
    		'title' => 'max:100',
    		'description' => 'max:150',
    		'author' => 'max:50',
    		'company' => 'max:50',
    		'email' => 'max:50',
    		'phone' => 'max:12',
    		'fax' => 'max:20',
    		'address' => 'max:100',
    	]);
    	$app = Application::find($id);
    	$imgName = $app->img;
    	$img 	 = $request->file('img');
    	if (!empty($img)) {
    		Storage::disk('local')->delete('public/app/img/'.$app->img);
    		Storage::disk('local')->delete('public/app/thumb/'.$app->img);
	    	$ex      = $img->getClientOriginalExtension();
	        $imgName = str_slug($request->app_name).'-'.date("YmdHis").'.'.$ex;
	        $img     = Image::make($img)->resize(null, 650, function ($constraint) {
	                        $constraint->aspectRatio();
	                    })->encode($ex);
	        $thumb   = Image::make($img)->resize(200, 200)->encode($ex);
	        Storage::put('public/app/img/'.$imgName, $img->__toString());
	        Storage::put('public/app/thumb/'.$imgName, $thumb->__toString());
    	}
        $app->update([
        	'img' => $imgName,
            'app_name' => $request->app_name,
    		'title' => $request->title,
    		'description' => $request->description,
    		'author' => $request->author,
    		'company' => $request->company,
    		'email' => $request->email,
    		'phone' => $request->phone,
    		'fax' => $request->fax,
    		'address' => $request->address,
    		'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('app.index');
    }

}
