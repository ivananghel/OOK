@extends('layouts.app')

@section('content')
<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-4">
			@if (session('status'))
				<div class="well no-padding">
					<header>
						{{trans('lang.success')}}
					</header>
					<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>{{ trans('Your password reset has been successfully') }}</div>
					<footer>
					<a class="btn btn-default" onclick="window.close()" >
								{{ trans('lang.close_window') }}
							</a>
					</footer>
				</div>

			@else
				<div class="well no-padding">
                    <form id="login-form" class="smart-form client-form"  method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

						<header>
							{{trans('Reset Password')}}
						</header>
						<fieldset>
							
							<section>
								<label class="label">{{trans('lang.e_mail')}}</label>
								<label class="input {{ $errors->has('email') ? 'state-error' : '' }}"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="email">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
									@if ($errors->has('email'))
									<em id="email-error" class="invalid" >{{ $errors->first('email') }}</em>
									@endif
							</section>
							
							<section>
								<label class="label">{{trans('lang.password')}}</label>
								<label class="input {{ $errors->has('password') ? 'state-error' : '' }}"> <i class="icon-append fa fa-lock"></i>
									<input id="password" type="password"  name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
								@if ($errors->has('password'))
								<em id="email-error" class="invalid" >{{ $errors->first('password') }}</em>
								@endif
							</section>

							<section>
								<label class="label">{{ trans('lang.confirm_password') }}</label>
								<label class="input {{ $errors->has('password_confirmation') ? 'state-error' : '' }}"> <i class="icon-append fa fa-lock"></i>
									<input id="password-confirm" type="password"  name="password_confirmation">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter password confirmation</b> </label>
								@if ($errors->has('password_confirmation'))
								<em id="email-error" class="invalid" >{{ $errors->first('password_confirmation') }}</em>
								@endif
							</section>
						</fieldset>


						<footer>
							<button type="submit" class="btn btn-primary">
								{{trans('Reset Password')}}	
							</button>
							<a class="btn btn-default" onclick="window.close()" >
								{{ trans('lang.close') }}
							</a>
						</footer>
                    </form>
				</div>
				@endif	
			</div>
		</div>
	</div>

</div>
<script>

    var url = window.location.href;
    $('input[name="email"]').val(url.split("?email=").pop().replace('%40', '@'));
</script>
@endsection
