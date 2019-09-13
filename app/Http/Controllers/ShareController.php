<?php

namespace App\Http\Controllers;

use Auth;
use App\Share;

use Illuminate\Http\Request;

class ShareController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }

    public function index () {
        $share   = Share::all();
        $providers = new Share();
        $providers = $providers->providers();
        return view('admin.share.index', compact('share','providers'));
    }

    public function store (Request $request) {
        foreach ($request->provider as $provider) {
        	$data = explode('::', $provider);
        	$share = new Share;
        	$share->provider_class = $data[0];
        	$share->url = $data[1];
        	$share->user_id = Auth::user()->id;
        	$share->save();
        }
        return back();
    }

    public function destroy ($id) {
        Share::whereId($id)->delete();
        return back();
    }

}
