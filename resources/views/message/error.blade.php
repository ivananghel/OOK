<script type="text/javascript">
	var content = '';

	@if( is_array($errors) )
        @foreach($errors as $error)
            content += '<i class="fa fa-times"></i> <i>{{ $error }}</i><br/>';
        @endforeach
    @else
        content += '<i class="fa fa-times"></i> <i>{{ $errors }}</i><br/>';
    @endif

	$.smallBox({
        title : '{{ trans('lang.error') }}',
        content : content,
        color : '#C46A69',
        iconSmall : 'fa fa-times fa-2x fadeInRight animated',
        timeout : 4000
    });
</script>