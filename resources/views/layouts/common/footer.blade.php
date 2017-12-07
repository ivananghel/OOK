	<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">{{ config('app.name' , 'Teleco') }} <span class="hidden-xs">-</span> © 2017</span>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->



		<!-- MAIN APP JS FILE -->
		<script src="js/app.min.js"></script>
    <script src="//js.pusher.com/2.2/pusher.min.js"></script>

        <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
        <!-- Voice command : plugin -->
        <script src="js/speech/voicecommand.min.js"></script>

		@yield('custom_plugin')

		<script>
			$(document).ready(function() {
				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();
				$.ajaxSetup({
				   headers: {
					   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				   }
				});
				//Display file name for input type file
                $(document).on('change', '.files', function () {
                    $path = $(this).val();
                    $(this).parent().parent().children().eq(0).val($path.replace(/^.*\\/, ""));
                });
                //remote modal custom
				$(document).on("click", ".remote_modal", function (e) {
					e.preventDefault();
					$(this).data('#remote_modal', null);// clear modal if has some information from last used 
					content = $('#remote_modal .modal-content');
					url = $(this).attr("ajax_target");
					$.get(url, function (html) {
						content.html(html);
						setTimeout(function(){
							$('#remote_modal').modal({show: true});
						},500)
					});
				});

				$('#remote_modal').on('hidden', function () {
					$(this).data('modal', null);
				});

				$('nav').on('click', function () {
					localStorage.clear();
				});

				$('.change_lang').click(function () {
					var new_language = $(this).attr("lang");

					$.get('welcome/changelanguage/', {'language': new_language}, function (data) {
						location.reload();
					})
					return false;
				});
				
				<?php if (isset($errors) && count($errors)): ?>
					<?php foreach($errors as $error): ?>
						$.smallBox({
							title: "<?php echo trans('lang.error'); ?>",
							content: "<?php echo $error; ?>",
							color: "#C46A69",
							icon: "fa fa-warning shake animated",
							timeout: 6000
						});
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if (isset($success) && count($success)): ?>
					$.smallBox({
						title: "<?php echo trans('lang.success'); ?>",
						content: "<?php echo trans($success[0]); ?>",
						color: "#739E73",
						icon: "fa fa-warning swing animated",
						timeout: 6000
					});
				<?php endif; ?>
				
					
				var pusher = new Pusher('533108ff2bcc333f7bfd');

				var channel = pusher.subscribe('register_user');

				channel.bind('App\\Events\\RegisterUserEvent', function(data) {
					console.log(data)
				});
			});

		</script>
		
		@yield('custom_script')
		<!-- Your GOOGLE ANALYTICS CODE Below -->
	</body>

</html>
