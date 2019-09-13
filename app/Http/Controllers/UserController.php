<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin');
    }

    public function index () {
    	$users = User::paginate(20);
    	return view('admin.user.index', compact('users'));
    }
    
    public function banned ($id) {
    	$user = User::find($id);
    	if ($user) {
    		$user->update([
    			'status' => 2,
    		]);
    	}
    	return redirect()->back();
    }

}
