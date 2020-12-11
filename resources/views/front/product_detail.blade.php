@extends('layouts.frontend.front_design')
@section('content')


<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
									<a href="{{ asset('images/products/large/' .$productdetail->image)}}">
										<img style="width:300px;"  class="mainimage" src="{{ asset('images/products/large/' .$productdetail->image)}}" alt="" />
									</a>		
								</div>
								
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active thumbnails">
										  @foreach($productaltimages as $altimg)	
										  <a href="{{ asset('images/products/large/' .$altimg->image)}}" data-standard="{{ asset('images/products/large/' .$altimg->image)}}">
										  		<img  class="changeimage" style="width:80px; cursor:pointer;" src="{{ asset('images/products/large/' .$altimg->image)}}" alt="" />
										  </a>
										  @endforeach
										</div>  
										
									</div>

								
							</div>

						</div>
						<div class="col-sm-7">
						<form name="addtocartform" id="addtocardform" action="{{url('add-cart')}}" method="post">@csrf

						   <input type="hidden" name="product_id" value="{{$productdetail->p_id}}">
						   <input type="hidden" name="product_name" value="{{$productdetail->product_name}}">
						   <input type="hidden" name="price" value="{{$productdetail->price}}">

							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$productdetail->product_name}}</h2>
								<p>{{$productdetail->description}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{$productdetail->price}}</span>
									<label>Quantity:</label>
									<input type="text" name="quantity" value="1" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</form>	
						</div>
					</div><!--/product-details-->
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php $count=1;?>
								@foreach($relatedproducts->chunk(3) as $chunk)

								<div <?php if($count==1){?> class="item active" <?php }else{?> class="item" <?php } ?>>	
									@foreach($chunk as $item)

									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="width:160px;" src="{{ asset('images/products/large/' .$item->image)}}" alt="" />
													<h2>INR {{$item->price}}</h2>

													<p>{{$item->product_name}}</p>
													<a href="{{url('product/'.$item->p_id)}}">
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
								<?php $count++; ?>
								@endforeach
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
</section>
	

@endsection