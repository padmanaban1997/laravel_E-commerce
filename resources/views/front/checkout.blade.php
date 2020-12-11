@extends('layouts.frontend.front_design')
@section('content')

<section id="form" style="margin-top:20px"; ><!--form-->
	<div class="container">
    <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>
             @if(Session::has('flash_message_error'))

                 <div class="alert alert-error alert-block" style="background-color:#f4d2d2">

                    <button type="button" class="close" data-dismiss="alert">x</button>

                            <strong>{!! session('flash_message_error') !!}</strong>

                </div>
             @endif		

        <form action="{{url('/checkout')}}" method="post" >@csrf
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
                        <h2>Bill To</h2>
                        

                            <div class="form-group">
                            <input type="text" name="billing_name" id="billing_name" value="{{ $userdetails->name}}" class="form-control" placeholder="Billing Name"/>
                            </div>
                            <div class="form-group">
                            <input type="text"name="billing_address" id="billing_address" value="{{ $userdetails->address}}"  class="form-control" placeholder="Billing address"/>
                            </div>
                            <div class="form-group">
                            <input type="text"name="billing_city" id="billing_city" value="{{ $userdetails->city}}"  class="form-control" placeholder="Billing city"/>
                            </div>
                            <div class="form-group">
                            <input type="text" name="billing_pincode" id="billing_pincode" value="{{ $userdetails->pincode}}" class="form-control" placeholder="Billing pincode"/>
                            </div>
                            <div class="form-group">
                            <input type="text" name="billing_contact" id="billing_contact" value="{{ $userdetails->contact}}" class="form-control" placeholder="Billing contact no"/>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"  id="billtoship">
                                <label class="form-check-label" for="billtoship">Shipping Address same as Billing Address</label>
                             </div>
					
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Ship To</h2>
						
                        <div class="form-group">
                            <input type="text" name="shipping_name" id="shipping_name" class="form-control" placeholder="Shipping Name"/>
                            </div>
                            <div class="form-group">
                            <input type="text"  name="shipping_address" id="shipping_address" class="form-control" placeholder="Shipping address"/>
                            </div>
                            <div class="form-group">
                            <input type="text"  name="shipping_city" id="shipping_city"  class="form-control" placeholder="Shipping city"/>
                            </div>
                            <div class="form-group">
                            <input type="text" name="shipping_pincode" id="shipping_pincode"  class="form-control" placeholder="Shipping pincode"/>
                            </div>
                            <div class="form-group">
                            <input type="text"  name="shipping_contact" id="shipping_contact" class="form-control" placeholder="Shipping contact no"/>
                            </div>
						   
							<button type="submit" class="btn btn-default">checkout</button>
				
					</div><!--/sign up form-->
				</div>
            </div>
        </form>    
	</div>
</section><!--/form-->
	

@endsection