@extends('layouts.frontend.front_design')
@section('content')


<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
			<div class="row">
			@if(Session::has('flash_message_success'))

				<div class="alert alert-success alert-block">

				<button type="button" class="close" data-dismiss="alert">x</button>

				<strong>{!! session('flash_message_success') !!}</strong>

				</div>
			@endif	
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Update account</h2>

						<form id="accountform" method="post" name="accountform" action="{{url('/account')}}" >   @csrf

									<input id="name" value="{{$userdetails->name}}" name="name" type="text" placeholder="Name"/>	
									<input id="address" value="{{$userdetails->address}}" name="address" type="text" placeholder="address"/>
									<input id="city" value="{{$userdetails->city}}"name="city" type="text" placeholder="city"/>
									<input id="pincode"value="{{$userdetails->pincode}}" name="pincode" type="text" placeholder="pincode"/>
									<input id="contact"value="{{$userdetails->contact}}" name="contact" type="text" placeholder="contact"/>
									<button type="submit" class="btn btn-default">Update</button>
						</form>
					
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Update password</h2>
						<form id="passwordform" method="post" name="passwordform" action="{{url('/update-user-pwd')}}" >   @csrf

							<input id="current_pwd" name="current_pwd" type="password" placeholder="Current password"/>	
							<span id="chkpwd"></span>
							<input id="new_pwd" name="new_pwd" type="password" placeholder="New password"/>	
							<input id="confirm_pwd" name="confirm_pwd" type="password" placeholder="Confirm password"/>	
							<button type="submit" class="btn btn-default">Update</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
	

@endsection