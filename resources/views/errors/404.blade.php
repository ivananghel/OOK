
@extends('layouts.errors')

@section('content')
    <!-- MAIN CONTENT -->
<div id="content">

    <!-- row -->
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center error-box">
                        <h1 class="error-text-2 bounceInDown animated"> Error 404 <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>
                        <h2 class="font-xl"><strong><i class="fa fa-fw fa-warning fa-lg text-warning"></i> Page <u>Not</u> Found</strong></h2>
                        <br />
                        <p class="lead">

                            The page you requested could not be found, either contact your webmaster or try again. Use our <b>Back</b> button or your browsers button to navigate to the page you have prevously come from
                        </p>

                        <b><a href="javascript:back();" class="lead">Back</a></b>
                        <script>
                            function back() {
                                history.go(-1);
                            }
                        </script>

                        <div class="row">

                            <div class="col-sm-12">
                                <ul class="list-inline">
                                    <li>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- end row -->

    </div>

</div>
<!-- END MAIN CONTENT -->
    @endsection