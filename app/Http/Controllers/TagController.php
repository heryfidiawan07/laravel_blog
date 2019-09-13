<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }
    
    public function index () {
    	$tags = Tag::all();
    	return view('admin.tag.index', compact('tags'));
    }
    
    public function store (Request $request) {
    	$this->validate($request, [
    		'name' => 'required|max:10|unique:tags',
    		'title' => 'max:100',
    		'description' => 'max:150',
    		'menu_type' => 'required',
    	]);
        Tag::create([
        	'name' => $request->name,
            'slug' => str_slug($request->name),
            'title' => $request->title,
            'description' => $request->description,
            'menu_type' => $request->menu_type,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
    
    public function update (Request $request, $id) {
    	$this->validate($request, [
            'name_edit' => 'required|min:3|max:15|unique:tags,name,' . $id ,
            'title_edit' => 'max:100',
            'description_edit' => 'max:150',
        ]);
        Tag::whereId($id)->update([
            'name' => $request->name_edit,
            'slug' => str_slug($request->name_edit),
            'title' => $request->title_edit,
            'description' => $request->description_edit,
            'menu_type' => $request->menu_type_edit,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
    
    public function destroy ($id) {
        $tag = Tag::whereId($id);
        if ($tag) {
        	$tag->delete();
        }
        return redirect()->back();
    }

}
