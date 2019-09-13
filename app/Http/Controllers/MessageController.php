<?php

namespace App\Http\Controllers;

use Auth;
use App\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function __construct () {
		return $this->middleware('admin')->except('store');
	}
	
	public function index () {
		$messages = Message::all();
		return view('admin.message.index', compact('messages'));
	}
	

    public function store (Request $request) {
    	$this->validate($request, [
    		'title' => 'required',
    		'email' => 'required',
    		'body'  => 'required',
    		'g-recaptcha-response' => 'required|captcha',
    	]);
    	$email = $request->email;
    	if (Auth::check()) {
    		if (Auth::user()) {
    			$email = Auth::user()->email;
    		}
    	}
    	Message::create([
    		'title' => $request->title,
    		'email' => $email,
    		'body'  => $request->body,
    	]);
    	return redirect()->back()->with('status', 'Message sent successfully.');
    }
    
    public function show ($id) {
    	$message = Message::find($id);
    	return view('admin.message.show', compact('message'));
    }
    
    public function destroy ($id) {
    	$message = Message::find($id);
    	if ($message) {
    		$message->delete();
    	}
    	return redirect()->back();
    }

}
