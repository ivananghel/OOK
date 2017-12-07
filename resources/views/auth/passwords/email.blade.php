@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-4">
						<div class="well no-padding">
							
							<form  id="login-form" class="smart-form client-form" role="form" method="POST"  action="{{ url('/password/email') }}">
								{{ csrf_field() }}
								<header>
									{{trans('Reset Password Result')}}
								</header>
								@if (session('status'))
									<div class="alert alert-success">
										{{ session('status') }}
									</div>
								@endif
<!--								<fieldset>
									
									<section>
										<label class="label">{{trans('Enter your email address')}}</label>
										<label class="input"> <i class="icon-append fa fa-envelope"></i>
											<input type="email" name="email">
											<b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Please enter email address for password reset</b></label>
									
									</section>
								</fieldset>-->
								<footer>
									<a class="btn btn-default" onclick="window.close()" >
										{{trans('lang.close_window')}}
									</a>
								</footer>
							</form>

						</div>
						
<!--<h5 class="text-center"> - Or sign in using -</h5>

<ul class="list-inline text-center">
	<li>
		<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
	</li>
	<li>
		<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
	</li>
	<li>
		<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
	</li>
</ul>
						-->
					</div>
				</div>
			</div>

		</div>
@endsection
