<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function index($slug){

    	$page = Page::where("slug", $slug)->first();

    	if(!$page)
    		abort(404);

    	return view("frontend.pages.index")->with(array("page"=>$page));
    }
}
