<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }
    
    public function index () {
    	$categories = Category::all();
    	return view('admin.category.index', compact('categories'));
    }
    
    public function store (Request $request) {
    	$this->validate($request, [
    		'name' => 'required|max:10|unique:categories',
    		'title' => 'max:100',
    		'description' => 'max:150',
    		'menu_type' => 'required',
    	]);
        Category::create([
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
            'name_edit' => 'required|min:3|max:15|unique:categories,name,' . $id ,
            'title_edit' => 'max:100',
            'description_edit' => 'max:150',
        ]);
        Category::whereId($id)->update([
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
    	$category = Category::find($id);
    	if ($category) {
    		$category->delete();
    	}
        return redirect()->back();
    }

}
