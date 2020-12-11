@extends('layouts.frontend.front_design')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
    @if(Session::has('flash_message_success'))

        <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">x</button>

                <strong>{!! session('flash_message_success') !!}</strong>

        </div>
    @endif	

			@if(Session::has('flash_message_error'))

				<div class="alert alert-error alert-block" style="background-color:#f4d2d2">

   					<button type="button" class="close" data-dismiss="alert">x</button>

		   			<strong>{!! session('flash_message_error') !!}</strong>

				</div>
			@endif		

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
								<a    href=""><img  style="width:80px;" src="{{ asset('images/products/large/' .$cart->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a  href="">{{$cart->product_name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>INR {{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->c_id.'/1')}}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2">
                                    
                                    @if($cart->quantity>1)
                 
                                    <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->c_id.'/-1')}}"> - </a>
                                    @endif

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">INR {{$cart->price*$cart->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('cart/delete-product/'.$cart->c_id)}}">X</a>
							</td>
                        </tr>

                        <?php  $total_amount= $total_amount+($cart->price*$cart->quantity); ?>
                        @endforeach

						
					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
							<li>Total <span>INR <?php echo $total_amount; ?></span></li>
						</ul>
							
							<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection