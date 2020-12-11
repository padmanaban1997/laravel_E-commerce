@extends('layouts.frontend.front_design')
@section('content')


 


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Order Review</li>
				</ol>
			</div><!--/breadcrums-->

			
		
		
			<div class="shopper-informations">
				<div class="row">
                <div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        <h2>Billing address</h2>
                        

                            <div class="form-group">
                           {{ $userdetails->name}}
                           </div>
                            <div class="form-group">
                           {{ $userdetails->address}}
                            </div>
                            <div class="form-group">
                            {{ $userdetails->city}}
                            </div>
            
                            <div class="form-group">
                           {{ $userdetails->pincode}}
                            </div>
                            <div class="form-group">
                            {{ $userdetails->contact}}
                            </div>

                            
					
					</div><!--/login form-->
				</div>
				
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Shipping address</h2>
						
                        <div class="form-group">
                            {{$shippingdetail->name}}
                            </div>
                            <div class="form-group">
                            {{$shippingdetail->address}}
                            </div>
                            <div class="form-group">
                           {{$shippingdetail->city}}
                            </div>
                            <div class="form-group">
                           {{$shippingdetail->pincode}}
                            </div>
                            <div class="form-group">
                           {{$shippingdetail->contact}}
                            </div>
						   
							
				
					</div><!--/sign up form-->
				</div>
								
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php $total_amount = 0; ?>
                        @foreach ($usercart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img  style="width:80px;" src="{{ asset('images/products/large/' .$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
                            <h4><a  href="">{{$cart->product_name}}</a></h4>
							</td>
							<td class="cart_price">
                            <p>INR {{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									{{$cart->quantity}}
								</div>
							</td>
							<td class="cart_total">
                            <p class="cart_total_price">INR {{$cart->price*$cart->quantity}}</p>
							</td>
							<?php  $total_amount= $total_amount+($cart->price*$cart->quantity); ?>
						</tr>
                        @endforeach
					
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td> Grand Total</td>
										<td><span>INR <?php echo $total_amount; ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentform" id="paymentform" action="{{url('/place-order')}}" method="post">@csrf
			<input type="hidden" name="grand_total" value="{{$total_amount}}" >
				<div class="payment-options">
					<span>
						<label> payment:</label>
					</span>
					<span>
						<label><input type="checkbox" name="payment_method" id="cod" value="cod"> COD</label>
					</span>
					<span style="float:right;">
					<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Place Order</button>
					</span>
				
				</div>
			</form>

		</div>
	</section> <!--/#cart_items-->




@endsection 