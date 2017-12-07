@extends('email.basic')

@section('content')

<table class="body-wrap" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;">
	<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
		<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
		<td class="container" bgcolor="#FFFFFF" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">

			<div class="content" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;">
				<table style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;">

					<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
						<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
							<h3 style="font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; line-height: 1.1; color: #000; font-weight: 500; font-size: 27px; margin: 0 0 15px; padding: 0;">
								{{trans('lang.hi')}}, {{$user->firstname.' '.$user->lastname}}
							</h3>

							@if($customMessage)
								<h5 style="font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; line-height: 1.6; color: #000; font-weight: 500; font-size: 16px; margin: 0 0 15px; padding: 0;">
									{{$customMessage}}
								</h5>
								<p class="lead" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;">
									{{trans('Your new password is')}} &nbsp;: &nbsp;{{$password}}
								</p>
							@endif
							@if($isNewUser)
								<p class="lead" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;">
									{{trans('lang.username')}}&nbsp;:&nbsp; {{$user->email}}
								</p>

								<p class="lead" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; font-weight: normal; font-size: 17px; line-height: 1.6; margin: 0 0 10px; padding: 0;">
									{{trans('lang.password')}} &nbsp;: &nbsp;{{$password}}
								</p>
							@endif
						</td>
					</tr>

				</table>
			</div>

			<div class="content" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;">
				<table style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;">
					<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
						<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
							<!-- social & contact -->
							<table class="social" width="100%" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; background: #ebebeb; margin: 0; padding: 0;" bgcolor="#ebebeb">
								<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
									<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">


										<!-- column 2 -->
										<table align="left" class="column" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 280px; float: left; min-width: 279px; margin: 0; padding: 0;">
											<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
												<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 15px;">

													<h5 class="" style="font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif; line-height: 1.1; color: #000; font-weight: 900; font-size: 17px; margin: 0 0 15px; padding: 0;">
														{{trans('lang.contact_info')}}:
													</h5>
													<p style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;">
														{{trans('lang.phone')}}:

														<strong style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
															{{config('project.contcat_info.phone')}}
														</strong>

														<br style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;" />
														{{trans('lang.email')}}:

														<strong style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
															<a href="emailto:{{config('project.contcat_info.email')}}" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; color: #2ba6cb; margin: 0; padding: 0;">
																{{config('project.contcat_info.email')}}
															</a>
														</strong>

													</p>

												</td>
											</tr>
										</table>
										<!-- /column 2 -->
										<span class="clear" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; display: block; clear: both; margin: 0; padding: 0;"></span>
									</td>
								</tr>
							</table>
							<!-- /social & contact -->
						</td>
					</tr>
				</table>
			</div>
			<!-- /content -->
		</td>
		<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
	</tr>
</table>
@endsection
