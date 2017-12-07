
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">{{ trans('lang.attach_link') }}</h4>
</div>
<div id="result"></div>

<div class="modal-body no-padding">

    <form action="update_link/{{$post->id}}" id="add-link-form" method="post" class="smart-form">
        <fieldset>
           
                <section class="col-lg-12">
                    <label class="label">{{ trans('lang.link') }}</label>
                    <label class="input"> <i class="icon-append fa fa-link"></i>
                        <input type="text" name="link" placeholder="{{ trans('lang.link') }}">
                    </label>
                </section>
          
        </fieldset>

        <footer>
            <button type="submit" class="btn btn-primary">
                {{ trans('lang.add') }}
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

   

  
    var errorClass = 'invalid';
    var errorElement = 'em';

    var $registerForm = $("#add-link-form").validate({
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
            link: {
                required: true
            }
           
        },
        // Messages for form validation
        messages: {
           
        },
        // Do not change code below
        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        },
        submitHandler: function (form) {
            submit_form('#add-link-form', '#result')
        }
    });
</script>