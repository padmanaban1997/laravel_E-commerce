@extends('layouts.frontend.front_design')
@section('content')


<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
			<div class="row">
            @if (Session::has('flash_message_error')) 
                <div class="alert alert-error alert-block" style="background-color: #F8D7DA">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{!! session('flash_message_error') !!}  </strong>
                </div>         
                @endif  
                @if (Session::has('flash_message_success')) 
                    <div class="alert alert-success alert-block" style="background-color: #D4EDDA">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{!! session('flash_message_success') !!}  </strong>
                    </div>         
                @endif	

				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form  id="loginform" name="loginform" action="{{url('user-login')}}" method="post">@csrf
							
							<input name="email" type="email" placeholder="Email Address" />
							<input name="password" type="password" placeholder="Password" />
							
							<button type="submit" class="btn btn-default">Login</button> </br>


							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
							&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   
							 <a class="" href="{{url('/forgot')}}">forget password?</a>



						
						</form>

						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="registerform" method="post" name="registerform" action="{{url('/user-register')}}" >   @csrf

                        <input id="name" name="name" type="text" placeholder="Name"/>
							<input id="email" name="email" type="email" placeholder="Email Address"/>
							<input  id="myPassword" name="password" type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section><!--/form-->
	

@endsection