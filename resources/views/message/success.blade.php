<script type="text/javascript">
	function callback(){
        $('#remote_modal').modal('hide');
        $.smallBox({
            title : '{{ trans('lang.success') }}',
            content : '<i class="fa fa-check"></i> <i>{{ $message }}</i>',
            color : '#659265',
            iconSmall : 'fa fa-check fa-2x fadeInRight animated',
            timeout : 4000
        });
        @if(isset($redirect))
		setTimeout(function(){
            window.location = '{{ $redirect }}';
        }, 1000);
		@endif
	}

	if(typeof otable != 'undefined'){
        otable.ajax.reload(callback);
	}
	else {
		callback();
	}
</script>