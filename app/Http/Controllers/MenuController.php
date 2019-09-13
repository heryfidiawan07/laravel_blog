<?php

namespace App\Http\Controllers;

use Auth;
use App\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    
    public function __construct () {
    	$this->middleware('admin');
    }

    public function index() {
        $menus 	 = Menu::all();
        $parents = Menu::has('parent',0)->get();
        return view('admin.menu.index', compact('menus','parents'));
    }

    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|min:3|max:15|unique:menus',
            'title' => 'max:100',
            'description' => 'max:150',
        ]);
        Menu::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }
     
    public function update (Request $request, $id) {	
        $this->validate($request, [
            'name_edit' => 'required|min:3|max:15|unique:menus,name,' . $id ,
            'title_edit' => 'max:100',
            'description_edit' => 'max:150',
        ]);
        $menu = Menu::find($id);
    	if ($menu) {
	        $menu->update([
	            'name' => $request->name_edit,
	            'slug' => str_slug($request->name_edit),
	            'title' => $request->title_edit,
	            'description' => $request->description_edit,
	            'status' => $request->status_edit,
	            'parent_id' => $request->parent_id_edit,
	            'user_id' => Auth::user()->id,
	        ]);
    	}
        return redirect()->back();
    }

    public function destroy ($id) {
    	$menu = Menu::find($id);
    	if ($menu) {
    		$menu->delete();
    	}
        return redirect()->back();
    }

}
