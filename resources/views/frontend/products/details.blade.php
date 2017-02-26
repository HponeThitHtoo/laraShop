@extends('frontend.layouts.app')

@section('content')

	<div class="w3l_banner_nav_right_banner3">
		<h3>Best Deals For New Products<span class="blink_me"></span></h3>
	</div>
	<div class="agileinfo_single">
		<h5>{{$product->title}}</h5>
		<div class="col-md-4 agileinfo_single_left">
			<img id="example" src="{{url('images/130x80/products/'.$product->image)}}" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-8 agileinfo_single_right">
			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked>
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<div class="w3agile_description">
				<h4>Description :</h4>
				<p>{{$product->description}}</p>
				<h4>Category :</h4>
				<p>{{$product->category}}</p>
				<h4>Brand :</h4>
				<p>{{$product->brand}}</p>
			</div>
			<div class="snipcart-item block">
				<div class="snipcart-thumb agileinfo_single_right_snipcart">
					<h4>{{$product->price}} <span>$25.00</span></h4>
				</div>
				<div class="snipcart-details agileinfo_single_right_details">
					<form action="#" method="post">
						<fieldset>
							<div class="my_button">
                                             <a href="{{route('frontend.addtocart', $product->id)}}" class="button">Add To Cart</a>
                                        </div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>

@endsection

@section('secondary_content')
    
@endsection