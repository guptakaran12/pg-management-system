@extends('auth.layout')
@section('title', 'Login | PG Management System')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <div class=" mb-4">
                <h2 class="mb-2">{{ __('Welcome') }}</h2>
                <p class="mb-0">{{ __('Please Enter Your Details To Sign In') }}</p>
            </div>

            <form id="login_form">
                @csrf
                <div class="mb-3 ">
                    <!-- UserName Or Email -->
                    <label class="form-label" for="username_or_email">{{ __('UserName Or Email Address') }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-icon mb-3 position-relative">
                        <input type="text" class="form-control my-1" name="username_or_email" id="username_or_email"
                            maxlength="80" autofocus placeholder="UserName Or Email" autofocus maxlength="50">
                        <span class="text-danger fw-bold" id="username_or_email_error" style="display:none"></span>
                    </div>

                    <!-- Password  -->
                    <label class="form-label my-2" for="password">
                        {{ __('Password') }} <span class="text-danger">*</span>
                    </label>
                    <div class="pass-group">
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="pass-input form-control password-field my-1" maxlength="30">
                        <span toggle="#password" class="ti toggle-password ti-eye-off toggle-password-icon"></span>
                    </div>
                    <span class="text-danger fw-bold my-1" id="password_error" name="password_error"
                        style="display:none"></span>
                </div>

                <div class="form-wrap form-wrap-checkbox mb-3">
                    <div class="d-flex align-items-center">
                        <div class="form-check form-check-md mb-0">
                            <input class="form-check-input mt-0" type="checkbox" value="1" id="remember"
                                name="remember">
                        </div>
                        <label class="ms-1 mb-0" for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    <div class="text-end ">
                        <a href="{{ route('password.request') }}" class="link-primary">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary w-100" id="login_button"
                        onclick="doLogin();">{{ __('Sign In') }}
                        <span class="spinner-border spinner-border-sm d-none ms-1" role="status" id="login_loader"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {!! hideValidationMsg() !!}
    {!! ajaxErrorHandlerScript() !!}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            hideValidationMsg();
        });

        $('.toggle-password-icon').click(function() {
            const input = $($(this).attr('toggle'));
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                $(this).removeClass('ti-eye-off').addClass('ti-eye-on');
            } else {
                input.attr('type', 'password');
                $(this).removeClass('ti-eye-on').addClass('ti-eye-off');
            }
        });

        function doLogin() {
            $("#login_button").addClass("disabled btn-loading");
            $("#login_loader").removeClass("d-none");
            var form = $("#login_form")[0];
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('do.login') }}",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (!response.status && response.errors) {
                        $.each(response.errors, function(key, value) {
                            $("#" + key).addClass('is-invalid');
                            $("#" + key + "_error").text(value).show();
                        });

                        $("#login_button").removeClass("disabled btn-loading");
                        $("#login_loader").addClass("d-none");

                        $("#password").val("");

                        setTimeout(function() {
                            $.each(response.errors, function(key) {
                                $("#" + key).removeClass('is-invalid');
                                $("#" + key + "_error").hide();
                            });
                        }, 7000);
                    } else if (response.status == false && response.wrong_credentials == false) {
                        $("#login_button").removeClass("disabled btn-loading");
                        $("#login_loader").addClass("d-none");
                        new Toast({
                            title: response.msg || "Invalid login credentials",
                            type: "error",
                            position: "top-center"
                        }).show();
                        $("#login_form")[0].reset();
                    } else {
                        $("#login_button").removeClass("disabled btn-loading");
                        $("#login_loader").addClass("d-none");
                        $("#login_form")[0].reset();
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    handleAjaxError(xhr, {
                        formSelector: '#login_form',
                        buttonSelector: '#login_button',
                        loaderSelector: '#login_loader',
                        fallbackMessage: 'Login failed.'
                    });
                }
            });
        }
    </script>
@endsection
