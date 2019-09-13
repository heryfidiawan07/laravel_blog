<?php

namespace App\Http\Controllers;

use Auth;
use App\Follow;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }

    public function index () {
        $follows   = Follow::all();
        $providers = new Follow();
        $providers = $providers->providers();
        return view('admin.follow.index', compact('follows','providers'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'url' => 'required',
        ]);
        Follow::create([
            'provider_class' => $request->provider,
            'url' => $request->url,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('follow.index');
    }

    public function update (Request $request, $id) {
        $this->validate($request, [
            'url_edit' => 'required',
        ]);
        Follow::findOrFail($id)->update([
            'url' => $request->url_edit,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('follow.index');
    }

    public function destroy ($id) {
        Follow::whereId($id)->delete();
        return redirect()->route('follow.index');
    }

}
