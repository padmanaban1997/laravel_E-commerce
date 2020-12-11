@extends('layouts.frontend.front_design')
@section('content')

<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">All  Items</h2>
                        @foreach($products  as $product)

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('images/products/large/' .$product->image)}}" alt="#" />
											<h2>INR {{$product->price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{url('product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">

											<h2>INR {{$product->price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{url('product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View</a>
											</div>
										</div>
										
								</div>
							
							</div>
						</div>
                        
                        @endforeach 
						
					</div> <!--features_items-->
					
@endsection