@extends('auth.layout')
@section('title', 'Forgot Password | PG Management System')
@section('content')
    <form id="password_request">
        @csrf
        <div class="card">
            <div class="card-body p-4">
                <div class=" mb-4">
                    <h2 class="mb-2">{{ __('Forgot Password?') }}</h2>
                    <p class="mb-0">
                        {{ __('If you forgot your password, well, then we’ll email you instructions to reset your password.') }}
                    </p>
                </div>

                <!-- Email -->
                <div class="mb-3 ">
                    <label class="form-label" for="email">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                    <div class="input-icon mb-3 position-relative">
                        <input type="email" name="email" id="email" maxlength="50" autofocus class="form-control">
                        <span class="text-danger fw-bold" style="display:none" id="email_error"><span />
                    </div>
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary w-100" id="reset_button" onclick="sendResetLink();">
                        {{ __('Send Reset Link') }}
                        <span class="spinner-border spinner-border-sm d-none ms-1" role="status" id="reset_loader"></span>
                    </button>
                </div>

                <div class="text-center">
                    <h6 class="fw-normal text-dark mb-0">{{ __('Return to') }} <a href="{{ route('login') }}"
                            class="hover-a ">{{ __('Login') }}</a>
                    </h6>
                </div>
            </div>
        </div>
    </form>
    {!! hideValidationMsg() !!}
    {!! ajaxErrorHandlerScript() !!}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            hideValidationMsg();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function sendResetLink() {
            $("#reset_button").addClass("disabled btn-loading");
            $("#reset_loader").removeClass("d-none");
            var email = $("#email").val();

            $.ajax({
                url: "{{ route('password.verify.email') }}",
                type: "post",
                data: {
                    email: email
                },
                success: function(response) {
                    if (!response.status && response.errors) {
                        $("#email").addClass('is-invalid');
                        $("#email_error").text(response.errors.email).show();
                        $("#reset_button").removeClass("disabled btn-loading");
                        $("#reset_loader").addClass("d-none");
                        setTimeout(() => {
                            $("#email").removeClass('is-invalid');
                            $("#email_error").text("").hide();
                        }, 7000);
                    } else {
                        $("#reset_button").removeClass("disabled btn-loading");
                        $("#reset_loader").addClass("d-none");
                        $("#email").val("");
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    handleAjaxError(xhr, {
                        formSelector: '#password_request',
                        buttonSelector: '#reset_button',
                        loaderSelector: '#reset_loader',
                        fallbackMessage: 'Forget password failed.'
                    });
                }
            });
        }
    </script>
@endsection
