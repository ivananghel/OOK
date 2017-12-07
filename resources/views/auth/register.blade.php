@extends('layouts.app')

@section('content')
<div id="main" role="main">

    <!-- MAIN CONTENT -->
    <div id="content" class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-4">
                <div class="well no-padding">
                    <form  id="register-form" class="smart-form" method="post" action="create">
                        {{ csrf_field() }}
                        <header>
                           {{trans('lang.registration')}}
                       </header>
                       <div id="result"></div>
                       <fieldset>
                        <section >
                            <label class="label">{{ trans('lang.first_name') }}</label>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="first_name" placeholder="{{ trans('lang.first_name') }}">
                            </label>
                        </section>
                        <section >
                            <label class="label">{{ trans('lang.last_name') }}</label>
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input type="text" name="last_name" placeholder="{{ trans('lang.last_name') }}">
                            </label>
                        </section>

                        <section >
                            <label class="label">{{ trans('lang.email') }}</label>
                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" placeholder="{{ trans('lang.email') }}" autocomplete="off">
                            </label>
                        </section>

                        <section >
                            <label class="label">{{ trans('lang.password') }}</label>
                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password" placeholder="{{ trans('lang.password') }}" id="password">
                                <b class="tooltip tooltip-bottom-right">{{ trans('lang.forgot_password_no') }}</b>
                            </label>
                        </section>

                        <section >
                            <label class="label">{{ trans('lang.confirm_password') }}</label>
                            <label class="input"> <i class="icon-append fa fa-lock"></i>
                                <input type="password" name="password_confirmation" placeholder="{{ trans('lang.confirm_password') }}">
                                <b class="tooltip tooltip-bottom-right">{{ trans('lang.forgot_password_no') }}</b>
                            </label>
                        </section>
                    </fieldset>
                    <footer>
                     <a href="{{url('login')}}" class="btn btn-primary pull-left">
                            {{trans('lang.back')}}   
                        </a>
                        <button type="submit" class="btn btn-primary">
                            {{trans('lang.add')}}   
                        </button>
                    </footer>
                </form>

            </div>

        </div>
    </div>
</div>

</div>
@endsection
@section('custom_script')



<script type="text/javascript">
runAllForms();

$(function () {

    var errorClass = 'invalid';
    var errorElement = 'em';

    var $registerForm = $("#register-form").validate({
        errorClass: errorClass,
        errorElement: errorElement,
        highlight: function (element) {
            $(element).parent().removeClass('state-success').addClass("state-error");
            $(element).removeClass('valid');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("state-error").addClass('state-success');
            $(element).addClass('valid');
        },
        // Rules for form validation
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 4,
                maxlength: 50
            },
            password_confirmation: {
                required: true,
                minlength: 4,
                maxlength: 50,
                equalTo: '#password'
            }
        },
        // Messages for form validation
        messages: {
            first_name: {
                required: "{{trans('lang.first_name_required')}}"
            },
            last_name: {
                required: "{{trans('lang.last_name_required')}}"
            },
            email: {
                required: "{{trans('lang.email_required')}}",
                email: "{{trans('lang.email_invalid')}}"
            },

            password: {
                required: "{{trans('lang.password')}}"
            },
            password_confirmation: {
                required: "{{trans('lang.confirm_password')}}",
                equalTo: "{{trans('lang.the_same')}}"
            }
        },
        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        },
        submitHandler: function (form) {
            submit_form('#register-form', '#result')
        }
    });
});
</script>
@endsection