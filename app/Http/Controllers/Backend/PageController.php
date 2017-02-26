<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\DeletePageRequest;
use Carbon\Carbon;
use Flash;

class PageController extends Controller
{
    public function index(){
        $pages = Page::select("pages.*")->paginate(4);

        return view("backend.pages.index")->with(array("pages"=>$pages));
    }

    public function create(){
        return view("backend.pages.create");
    }

    public function store(CreatePageRequest $request){
        $data = $request->all();

        $page = Page::create($data);

        return redirect()->route("admin.pages.index")->withFlashSuccess("Page Created Successfully.");
    }

    public function show(){

    }

    public function edit($id){
        $page = Page::find($id);

        if(!$page)
            abort(404);

        return view("backend.pages.edit")->with(array("page"=>$page));
    }

    public function update($id, UpdatePageRequest $request){
        $data = $request->all();

        $page = Page::find($id);

        if(!$page)
            abort(404);

        $page->update($data);

        return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function destroy($id, DeletePageRequest $request){
        $page = Page::find($id);

        if(!$page)
            return redirect(route("admin.pages.index"))->with("flash_warning", "Page not found.");

        $page->delete();

        return redirect(route("admin.pages.index"))->with("flash_success", "Deleted Successfully.");
    }
}
