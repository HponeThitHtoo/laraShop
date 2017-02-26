<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\SendEmailMessageRequest;
use Input;
use Mail;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		//$categories = Category::where("parent_id", 0)->get();

		$categories = Category::nested()->get(); // for nested menu

		$categories_html = Category::renderAsHtml();

		$hot_products = Product::where("products.category_id", 13)->get();

		return view('frontend.index')->with(array("hot_products"=>$hot_products, "categories_html"=>$categories_html));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function macros()
	{
		return view('frontend.macros');
	}

	public function products(){
		//$categories = Category::where("parent_id", 0)->get();

		

		$category_id = Input::get("category");

		$category = null;
		$category = Category::find($category_id);

		

		$keyword = Input::get("q");

		//for default
		$products = Product::join("categories", "categories.id", "=", "products.category_id");

		// for clicking menu
		if($category){
			$products = $products->where("products.category_id", $category_id);
		}

		// for search
		if($keyword){
			$products = $products->where("products.title", "like", "%".$keyword."%");
		}

		$products = $products->orderBy("products.created_at", "Desc")
		->select("products.*", "categories.title AS category_title")
		->paginate(16);

		return view("frontend.products.index")
		->with(array("products"=>$products, "category"=>$category));
	}

	public function productdetails($id){
	   //$categories = Category::where("parent_id", 0)->get();

        $product = Product::join("categories", "categories.id", "=", "products.category_id")
        ->join("brands", "brands.id", "=", "products.brand_id")
        ->where("products.id", $id)
        ->select("products.*", "categories.title AS category", "brands.name AS brand")
        ->first();

        if(!$product)
            abort(404);

        return view("frontend.products.details")->with(array("product"=>$product));
    }

    public function contactus(){
    	  //$categories = Category::where("parent_id", 0)->get();

    	  //return view("frontend.contactus")->with(array("categories"=>$categories));
    		return view("frontend.contactus");
    }

    public function send_message(SendEmailMessageRequest $request){
    	  $data = $request->all();

    	  //dd($data);

    	  Mail::send("frontend.email.contactmessage", $data, function($message){
    	  	$recepient = "white.nuzzle@gmail.com";
    	  	$message->to($recepient);
    	  	$message->subject("Message from LaraShop");
    	  });

    	  return redirect()->route('frontend.contactus')->withFlashSuccess("Your Message is sent.");
    }

    public function faq(){
    	  //$categories = Category::where("parent_id", 0)->get();

    	  //return view("frontend.faq")->with(array("categories"=>$categories));
    		return view("frontend.faq");
    }
}
