<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    
    public function __construct() {
        $this->middleware('admin');
    }

    public function destroy ($id) {
    	$pict = Picture::find($id);
    	if ($pict) {
	    	Storage::disk('local')->delete('public/post/img/'.$pict->img);
	    	Storage::disk('local')->delete('public/post/thumb/'.$pict->img);
	    	$pict->delete();
    	}
    	return redirect()->back();
    }

}
