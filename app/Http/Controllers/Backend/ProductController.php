<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Access\User\User;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use Carbon\Carbon;
use Flash;
use Image;

class ProductController extends Controller
{
    public function index(){

            /*$products = Product::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select("products.*", "users.name AS user", "categories.title AS category")
            ->orderBy("products.created_at", "DESC")
            ->paginate(2);*/

        $products = Product::join("users", "users.id", "=", "products.user_id")
        ->join("categories", "categories.id", "=", "products.category_id")
        ->join("brands", "brands.id", "=", "products.brand_id");
        $products = $products->select("products.*", "users.name AS user", "categories.title AS category", "brands.name AS brand")->orderBy("products.created_at","ASC")->paginate(2);

        /*foreach($products as $product){
            $product->created_ago = Carbon::createFromTimeStamp(strtostring($product->created_at))->diffForHumans();
        }*/

        return view('backend.products.index')->with(array("products"=>$products));
    }

    public function create(){
        $users = User::all()->pluck("name","id");
        $categories = Category::all()->pluck("title", "id");
        $brands = Brand::all()->pluck("name","id");

        return view("backend.products.create")->with(array("users"=>$users, "categories"=>$categories, "brands"=>$brands));
    }

    public function store(CreateProductRequest $request){
        $data = $request->all();

        if(!empty($_FILES['image']['name'])){
            $img = Image::make($_FILES['image']['tmp_name']);

            $img->resize(800,640);
            $img_name = time().".jpg";
            $img->save(public_path("uploads/products/".$img_name));

            $data["image"] = $img_name;
        }

        $product = Product::create($data);
        return redirect()->route("admin.products.index")->withFlashSuccess("Product Created Successfully.");
    }

    public function show(){

    }

    public function edit($id){
        $product = Product::find($id);

        if(!$product)
            abort(404);

        $users = User::all()->pluck("name", "id");
        $categories = Category::all()->pluck("title", "id");
        $brands = Brand::all()->pluck("name", "id");

        return view("backend.products.edit")->with(array("product"=>$product, "users"=>$users, "categories"=>$categories, "brands"=>$brands));
    }

    public function update($id, UpdateProductRequest $request){
        $data = $request->all();

        $product = Product::find($id);

        if(!$product)
            abort(404);

        if(!empty($_FILES['image']['name'])){
            $img = Image::make($_FILES['image']['tmp_name']);

            $img->resize(800, 640);
            $img_name = time().".jpg";
            $img->save(public_path("uploads/products/".$img_name));

            $data["image"] = $img_name;
        }

        $product->update($data);

        return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function destroy($id, DeleteProductRequest $request){
        $product = Product::find($id);

        if(!$product)
            return redirect(route("admin.products.index"))->with("flash_warning", "Product not found!");

        $product->delete();
        return redirect(route("admin.products.index"))->with("flash_success", "Deleted successfully.");
    }

}
