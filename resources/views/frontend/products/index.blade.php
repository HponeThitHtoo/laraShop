@extends('frontend.layouts.app')

@section('content')

            <div class="w3l_banner_nav_right_banner3">
                <h3>Best Deals For New Products<span class="blink_me"></span></h3>
            </div>
            <div class="w3l_banner_nav_right_banner3_btm">

                @foreach($brand_logos as $brand_logo)
                    <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                        <a href='{{url("/products?brand=".$brand_logo->id)}}'>
                        <div class="view view-tenth">
                            <img src="{{url('images/200x200/brands/'.$brand_logo->logo)}}" alt=" " class="img-responsive" />
                            <div class="mask">
                                <h4>{{$brand_logo->name}}</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                        </a>
                        {{-- <h4>Utensils</h4>
                        <ol>
                            <li>sunt in culpa qui officia</li>
                            <li>commodo consequat</li>
                            <li>sed do eiusmod tempor incididunt</li>
                        </ol> --}}
                    </div>
                @endforeach

                {{--
                <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                    <div class="view view-tenth">
                        <img src="images/14.jpg" alt=" " class="img-responsive" />
                        <div class="mask">
                            <h4>Grocery Store</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                        </div>
                    </div>
                    <h4>Hair Care</h4>
                    <ol>
                        <li>enim ipsam voluptatem officia</li>
                        <li>tempora incidunt ut labore et</li>
                        <li>vel eum iure reprehenderit</li>
                    </ol>
                </div>
                <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                    <div class="view view-tenth">
                        <img src="images/15.jpg" alt=" " class="img-responsive" />
                        <div class="mask">
                            <h4>Grocery Store</h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                        </div>
                    </div>
                    <h4>Cookies</h4>
                    <ol>
                        <li>dolorem eum fugiat voluptas</li>
                        <li>ut aliquid ex ea commodi</li>
                        <li>magnam aliquam quaerat</li>
                    </ol>
                </div> --}}
                <div class="clearfix"> </div>
            </div>
            <div class="w3ls_w3l_banner_nav_right_grid">
                <h3>Popular Brands</h3>
                @if(count($products) > 0)
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    @if($category)
                    <h6>{{$category->title}}</h6>
                    @elseif($brand)
                    <h6>{{$brand->name}}</h6>
                    @else
                    <h6>Products</h6>
                    @endif
                    @foreach($products as $product)
                    <div class="col-md-3 w3ls_w3l_banner_left">
                        <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="{{route('frontend.productdetails', $product->id)}}"><img src="{{url('images/130x80/products/'.$product->image)}}" alt=" " class="img-responsive" /></a>
                                            <p>{{$product->title}}</p>
                                            <h4>{{$product->price}} <span>$5.00</span></h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <form action="#" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="knorr instant soup" />
                                                    <input type="hidden" name="amount" value="3.00" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                             <div class="my_button">
                                                    <a href="{{route('frontend.addtocart', $product->id)}}" class="button">Add To Cart</a>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"> </div>
                </div>
                @else
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    @if($category)
                    <h6>{{$category->title}}</h6>
                    @else
                    <h6>Products</h6>
                    @endif
                   <h6>No Product Found</h6>
                </div>
                @endif

                {{$products->links()}}

            </div>

@endsection

@section('secondary_content')
    
@endsection