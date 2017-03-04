<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use Flash;
use Image;

class CategoryController extends Controller
{
    public function index(){
    	$categorie_list = Category::paginate(3);

    	return view("backend.categories.index")->with(array("categorie_list"=>$categorie_list));
    }

    public function create(){
            $parent_categories = ["0"=>""] + Category::where("parent_id",0)->pluck("title", "id")->toArray();

            return view("backend.categories.create")->with(array("parent_categories"=>$parent_categories));
    }

    public function store(CreateCategoryRequest $request){
        $data = $request->all();

        $img = Image::make($_FILES['icon_image']['tmp_name']);
        $img->resize(800, 640);

        $img_name = time().".jpg";
        $img->save(public_path("uploads/categories/" . $img_name));

        $data["icon_image"] = $img_name;

        $category = Category::create($data);
        return redirect()->route('admin.categories.index')->withFlashSuccess("Category created successfully.");
    }

    public function show(){

    }

    public function edit($id){
        $category = Category::find($id);

        $parent_categories = ["0"=>""] + Category::where("parent_id", 0)->pluck("title", "id")->toArray();

        if(!$category)
            abort(404);

        return view("backend.categories.edit")->with(array("category"=>$category, "parent_categories"=>$parent_categories));
    }

    public function update($id, UpdateCategoryRequest $request){
        $data = $request->all();

        $category = Category::find($id);

        if(!$category)
            abort(404);

        if(isset($_FILES['icon_image'])){
            //dd($_FILES['icon_image']);

            $img = Image::make($_FILES['icon_image']['tmp_name']);
            $img -> resize(800, 640);

            $img_name = time().".jpg";
            $img->save(public_path("uploads/categories/".$img_name));

            $data["icon_image"] = $img_name;
        }

        $category->update($data);

        return redirect()->back()->with("flash_success", "updated Successfully.");
    }

    public function destroy($id, DeleteCategoryRequest $request){
        $category = Category::find($id);

        if(!$category)
            return redirect(route("admin.categories.index"))->with("flash_warning", "Category not found!");

        $category->delete();
        return redirect(route("admin.categories.index"))->with("flash_success", "Deleted Successfully.");
    }
}
