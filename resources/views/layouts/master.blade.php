@include("layouts.common.header")
 @section('topbar')
	@include("layouts.common.topbar")
@show
 @section('sidebar')
	@include("layouts.common.sidebar")
@show

@yield('content')

@section('footer')
	@include("layouts.common.footer")
@show
