@extends('layouts.frontend.front_design')
@section('content')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>EX</span>-plorer</h1>
								
									<p>A bad day camping is still better than a good day working. </p>
										</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend_images/home/hiking.jpg')}}"  class="girl img-responsive"  alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Ex</span>-plorer</h1>
									
									<p>Look deep into nature and then you will understand everything better. </p>
									
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend_images/home/hiking2.jpg')}}" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Ex</span>-plorer</h1>
									
									<p>A bad day camping is still better than a good day working. </p>
									
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('images/frontend_images/home/hiking3.jpg')}}" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">All  Items</h2>
                        @foreach($productsall as $product)

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('images/products/large/' .$product->image)}}" alt="" />
											<h2>INR {{$product->price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="{{url('product/'.$product->p_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>view</a>
										</div>
										
								</div>
							
							</div>
						</div>
                        
                        @endforeach 
						
					</div> <!--features_items-->
					
				
				
				</div>
			</div>
		</div>
	</section>
@endsection
