<!-- Inliner Build Version 4380b7741bb759d6cb997545f3add21ad48f010b -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
	<head>
		<!-- If you delete this meta tag, Half Life 3 will never be released. -->
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>d</title>
	</head>
	<body bgcolor="#FFFFFF" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;"><style type="text/css">
			@media only screen and (max-width:600px) {
				a[class="btn"] {
					display: block !important; margin-bottom: 10px !important; background-image: none !important; margin-right: 0 !important;
				}
				div[class="column"] {
					width: auto !important; float: none !important;
				}
				table.social div[class="column"] {
					width: auto !important;
				}
			}
		</style>

		<!-- HEADER -->
		<table class="head-wrap"  style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;"><tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"><td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
				<td class="header container" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">

					<div class="content" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;">
						<table style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;">
							<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
								<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
									<img src="<?php echo $message->embed(base_path() . '/public/img/logo-red.png'); ?>" height="30" width="142" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; max-width: 100%; margin: 0; padding: 0;" />
								</td>
								<td align="right" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
								</td>
							</tr>
						</table>
					</div>

				</td>
				<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
			</tr>
		</table>
		<!-- /HEADER -->
		
		<!-- BODY -->
		@yield('content')
		<!-- /BODY -->
		
		<!-- FOOTER -->
		<table class="footer-wrap" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; clear: both !important; margin: 0; padding: 0;">
			<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"><td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
				<td class="container" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;">

					<!-- content -->
					<div class="content" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; max-width: 600px; display: block; margin: 0 auto; padding: 15px;">
						<table style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; width: 100%; margin: 0; padding: 0;">
							<tr style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
								<td align="center" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;">
									<p style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; font-weight: normal; font-size: 14px; line-height: 1.6; margin: 0 0 10px; padding: 0;">
										<a href="{{config('project.terms_link')}}" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; color: #2ba6cb; margin: 0; padding: 0;">
											Terms
										</a> |
										<a href="{{config('project.privacy_link')}}" style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; color: #2ba6cb; margin: 0; padding: 0;">
											Privacy
										</a>
									
									</p>
								</td>
							</tr>
						</table>
					</div>
					<!-- /content -->

				</td>
				<td style="font-family: 'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif; margin: 0; padding: 0;"></td>
			</tr>
		</table>
		<!-- /FOOTER -->
	</body>
</html>
