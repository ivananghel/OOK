@include("layouts.common.header")
 @section('topbar')
	@include("layouts.common.topbar")
@show


@yield('content')

@section('footer')
	@include("layouts.common.footer")
@show
