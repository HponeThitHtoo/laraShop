<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Requests\DeleteBrandRequest;
use Carbon\Carbon;
use Flash;
use Image;


class BrandController extends Controller
{
    public function index(){
    	$brands = Brand::select("brands.*")->paginate(4);

    	return view("backend.brands.index")->with(array("brands"=>$brands));
    }

    public function create(){
    	return view("backend.brands.create");
    }

    public function store(CreateBrandRequest $request){
    	$data = $request->all();

    	$img = Image::make($_FILES["logo"]["tmp_name"]);

    	$img->resize(800,640);
    	$img_name = time().".jpg";
    	$img->save(public_path("uploads/brands/".$img_name));

    	$data["logo"] = $img_name;

    	$brand = Brand::create($data);

    	return redirect()->route("admin.brands.index")->withFlashSuccess("Brand Created Successfully.");
    }

    public function show(){

    }

    public function edit($id){
    	$brand = Brand::find($id);

    	if(!$brand)
    		abort(404);

    	return view("backend.brands.edit")->with(array("brand"=>$brand));
    }

    public function update($id, UpdateBrandRequest $request){
    	$data = $request->all();

    	$brand = Brand::find($id);

    	if(!$brand)
    		abort(404);

    	if(isset($_FILES["logo"])){
    		$img = Image::make($_FILES["logo"]["tmp_name"]);

    		$img->resize(800,640);
    		$img_name = time().".jpg";
    		$img->save(public_path("uploads/brands/".$img_name));

    		$data["logo"] = $img_name;
    	}

    	$brand->update($data);

    	return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function destroy($id, DeleteBrandRequest $request){
    	$brand = Brand::find($id);

    	if(!$brand)
    		return redirect(route("admin.brands.indes"))->with("flash_warning", "Brand nout found!");

    	$brand->delete();
    	return redirect(route("admin.brands.index"))->with("flash_success", "Deleted successfully.");
    }
}
