<?php

namespace App\Http\Controllers;

use Auth;
use Purifier;
use App\Page;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function __construct () {
		$this->middleware('admin')->except('show');
	}
	
    public function index()
    {	
    	$pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        	'name' => 'required|min:3|max:50|unique:pages',
        	'title' => 'required|min:3|max:200',
        	'body' => 'required|min:3',
        	'form' => 'required',
        ]);
        Page::create([
        	'name' => $request->name,
        	'slug' => str_slug($request->name),
        	'title' => $request->title,
        	'body' => Purifier::clean($request->body, array(
        				'CSS.AllowTricky' => true , 
                    	'HTML.SafeIframe' => true , 
                    	"URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"
                    )),
        	'form' => $request->form,
        	'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('page.index')->with('status', 'New page successfuly created.');
    }

    public function show($slug)
    {
        $page = Page::whereSlug($slug)->first();
        if ($page) {
        	return view('page.show', compact('page'));
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $page = Page::find($id);
        if ($page) {
        	return view('admin.page.edit', compact('page'));
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {	
    	$this->validate($request, [
        	'name' => 'required|min:3|max:50|unique:pages,name,' . $id ,
        	'title' => 'required|min:3|max:200',
        	'body' => 'required|min:3',
        	'form' => 'required',
        ]);
        Page::whereId($id)->update([
        	'name' => $request->name,
        	'slug' => str_slug($request->name),
        	'title' => $request->title,
        	'body' => Purifier::clean($request->body, array(
        				'CSS.AllowTricky' => true , 
                    	'HTML.SafeIframe' => true , 
                    	"URI.SafeIframeRegexp" => "%^(http://|https://|//)(www.youtube.com/embed/|player.vimeo.com/video/)%"
                    )),
        	'form' => $request->form,
        	'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('page.index')->with('status', 'Page edited successfuly.');
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        if ($page) {
        	$page->delete();
        }
        return redirect()->back()->with('status', 'Page deleted successfuly.');
    }

}
