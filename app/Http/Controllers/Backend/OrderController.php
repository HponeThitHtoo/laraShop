<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Access\User\User;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\DeleteOrderRequest;
use Carbon\Carbon;
use Flash;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::join("users", "users.id", "=", "orders.customer_id")
    		->select("orders.*", "users.name AS customer")
    		->orderBy("orders.created_at", "ASC")
    		->paginate(2);

    	return view("backend.orders.index")->with(array("orders"=>$orders));
    }

    public function create(){
    	$customers = User::all()->pluck("name", "id");
    	$products = Product::all()->pluck("title", "id");

    	return view("backend.orders.create")->with(array("customers"=>$customers, "products"=>$products));
    }

    public function store(CreateOrderRequest $request){
    	$data = $request->all();
    	$order = Order::create($data);

    	$products = $data["product_ids"];

    	if(is_array($products)){
    		foreach($products as $product){
    			OrderItem::create([
    				"order_id"=>$order->id,
    				"product_id"=>$product,
    				"order_item_amount"=>0
    			]);
    		}
    	}

    	return redirect()->route("admin.orders.index")->withFlashSuccess("Order Created Successfully.");
    }

    public function show($id){
    	$order_items = OrderItem::join("products", "products.id", "=", "order_items.product_id")
    		->join("orders", "orders.id", "=", "order_items.order_id")
    		->join("users", "users.id", "=", "orders.customer_id")
    		->select("order_items.*", "users.name AS customer", "products.title AS product_title", "orders.order_amount AS order_amount", "products.price AS product_price")
    		->where("order_items.order_id", $id)
    		->orderBy("order_items.created_at", "ASC")
    		->paginate(2);

    	return view("backend.orders.show")->with(array("order_items"=>$order_items));
    }

    public function edit($id){
    	$order = Order::find($id);

    	if(!$order)
    		abort(404);

    	$customers = User::all()->pluck("name", "id");
    	$products = Product::all()->pluck("title", "id");

    	return view("backend.orders.edit")->with(array("order"=>$order, "customers"=>$customers, "products"=>$products));
    }

    public function update($id, UpdateOrderRequest $request){
	$data = $request->all();

        $order = Order::find($id);

        if(!$order)
            abort(404);

        $order->update($data);

        return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function destroy($id, DeleteOrderRequest $request){
    	$order = Order::find($id);

        if(!$order)
            return redirect(route("admin.orders.index"))->with("flash_warning", "Product not found!");

        $product->delete();
        return redirect(route("admin.orders.index"))->with("flash_success", "Deleted successfully.");
    }
}

