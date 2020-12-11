@extends('layouts.frontend.front_design')
@section('content')


<section id="form" style="margin-top:20px;"><!--form-->
		<div class="container">
			<div class="row">
            @if(Session::has('flash_message_error'))

                    <div class="alert alert-error alert-block" style="background-color:#f4d2d2">

                            <button type="button" class="close" data-dismiss="alert">x</button>

                            <strong>{!! session('flash_message_error') !!}</strong>

                    </div>
            @endif		

				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form  id="forgotform" name="forgotform" action="{{url('forgot')}}" method="post">@csrf
							
							<input name="email" type="email" placeholder="Email Address" />
							
							
							<button type="submit" class="btn btn-default">forgot password</button>
						</form>
					</div><!--/login form-->
				</div>
			
			</div>
		</div>
</section><!--/form-->
	

@endsection