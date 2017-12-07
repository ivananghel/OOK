
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">{{ trans('lang.add_user') }}</h4>
</div>
<div id="result"></div>

<div class="modal-body no-padding">

    <form action="users" id="add-user-form" method="post" class="smart-form">
        <fieldset>

            <div class="row">
                <section class="col col-6">
                    <label class="label">{{ trans('lang.first_name') }}</label>
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                        <input type="text" name="first_name" placeholder="{{ trans('lang.first_name') }}">
                    </label>
                </section>


                <section class="col col-6">
                    <label class="label">{{ trans('lang.last_name') }}</label>
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                        <input type="text" name="last_name" placeholder="{{ trans('lang.last_name') }}">
                    </label>
                </section>
            </div>

            <div class="row">
                <section class="col col-6">
                    <label class="label">{{ trans('lang.email') }}</label>
                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" name="email" placeholder="{{ trans('lang.email') }}" autocomplete="off">
                    </label>
                </section>
            </div>

        </fieldset>

        <fieldset>
            <div class="row">
                <section class="col col-6">
                    <label class="label">{{ trans('lang.password') }}</label>
                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                        <input type="password" name="password" placeholder="{{ trans('lang.password') }}" id="password">
                        <b class="tooltip tooltip-bottom-right">{{ trans('lang.forgot_password_no') }}</b>
                    </label>
                </section>

                <section class="col col-6">
                    <label class="label">{{ trans('lang.confirm_password') }}</label>
                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                        <input type="password" name="password_confirmation" placeholder="{{ trans('lang.confirm_password') }}">
                        <b class="tooltip tooltip-bottom-right">{{ trans('lang.forgot_password_no') }}</b>
                    </label>
                </section>
            </div>

        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">
                {{ trans('lang.add') }} {{ trans('lang.user') }}
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
                {{ trans('lang.cancel') }}
            </button>
        </footer>
    </form>

</div>


<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/jquery_form/jquery.form.js"></script>

<script>

    $(document).on('change', '.files', function () {
        $path = $(this).val();
        $(this).parent().parent().children().eq(0).val($path.replace(/^.*\\/, ""));
    });

    $(document).on('click', '.btn-group-justified a', function (event) {

        var btn = $(this);
        btn.addClass(btn.data('color'));
        $('input[name="status"]').val(btn.data('status'));

        $(this).parent().find('.btn').each(function (index, item) {
            if ($(item).data('color') == btn.data('color')) {
                return true;
            }
            $(this).removeClass($(this).data('color')).addClass('btn-default');
        });
    });

    var errorClass = 'invalid';
    var errorElement = 'em';

    var $registerForm = $("#add-user-form").validate({
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
                required: "{{trans('lang.password').' '.trans('lang.required')}}"
            },
            password_confirmation: {
                required: "{{trans('lang.confirm_password').' '.trans('lang.required')}}",
                equalTo: "{{trans('lang.the_same').' '.trans('lang.required')}}"
            }
        },
        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        },
        submitHandler: function (form) {
            submit_form('#add-user-form', '#result')
        }
    });
</script>