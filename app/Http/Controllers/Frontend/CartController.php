<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Cart;
use App\Http\Requests\CheckoutRequest;

class CartController extends Controller
{
	public function index(){
		//$categories = Category::where("parent_id", 0)->get();

		//return view("frontend.shop.shoppingcart")->with(array("categories"=>$categories));
		return view("frontend.shop.shoppingcart");
	}

	public function add($product_id){
		$product = Product::find($product_id);

		if(!$product)
			abort(404);

		Cart::add($product_id, $product->title, 1, $product->price);

		return redirect(route("frontend.shoppingcart"))->with("flash_success", "Product Added to Cart");
	}

	public function checkout(){
		//$categories = Category::where("parent_id", 0)->get();

		//return view("frontend.shop.checkout")->with(array("categories"=>$categories));
		return view("frontend.shop.checkout");
	}

	public function checkout_process(CheckoutRequest $request){
		$data = $request->all();
		//dd($data);

		$customer_id = Auth::id();
		$order_amount = Cart::total(2, ".", ""); //reference cart documentation
		$products = Cart::content();

		$order = Order::create([
			"customer_id"=>$customer_id,
			"order_amount"=>$order_amount,
			"order_address"=>$data["address"],
			"order_phone"=>$data["phone"],
			"payment_method"=>$data["payment_method"]
		]);

		foreach($products as $product){
			OrderItem::create([
				"order_id"=>$order->id,
				"product_id"=>$product->id,
				"order_item_amount"=> $product->price,
				"qty" => $product->qty
			]);
		}

		Cart::destroy(); // clearing to empty shopping cart

		return redirect(route('frontend.thankyou'))->with('flash_success', 'Your Checkout is Completed Successfully.');

	}

	public function thankyou(){
		//$categories = Category::where("parent_id", 0)->get(); // for side bar

		//return view('frontend.shop.thankyou')->with(array('categories'=>$categories));
		return view('frontend.shop.thankyou');
	}
}
