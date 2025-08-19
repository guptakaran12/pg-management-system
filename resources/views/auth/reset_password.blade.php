@extends('auth.layout')
@section('title', 'Reset Password | PG Management System')
@section('content')
    <form id="reset_password">
        @csrf
        <div class="card">
            <div class="card-body p-4">
                <div class=" mb-4">
                    <h2 class="mb-2">{{ __('Reset Password') }}</h2>
                    <p class="mb-0">
                        {{ __('Choose a strong password to keep your PG Management System account safe') }}
                    </p>
                </div>

                <!-- New Password -->
                <div class="mb-2">
                    <input type="hidden" class="form-control form-control-lg" id="email" name="email"
                        value="{{ $email }}">
                    <label class="form-label" for="new_password">{{ __('New Password') }} <span
                            class="text-danger">*</span></label>
                    <div class="input-icon mb-2 position-relative">
                        <input type="password" name="new_password" id="new_password" maxlength="30" autofocus
                            class="form-control">
                        <span toggle="#new_password" class="ti toggle-password ti-eye-off toggle-password-icon"></span>
                    </div>
                    <span class="text-danger fw-bold" style="display:none" id="new_password_error"><span />
                </div>

                <!-- Confirm Password -->
                <div class="mb-2">
                    <label class="form-label" for="confirm_password">{{ __('Confirm Password') }} <span
                            class="text-danger">*</span></label>
                    <div class="input-icon mb-2 position-relative">
                        <input type="password" name="confirm_password" id="confirm_password" maxlength="30" autofocus
                            class="form-control">
                        <span toggle="#confirm_password" class="ti toggle-password ti-eye-off toggle-password-icon"></span>
                    </div>
                    <span class="text-danger fw-bold" style="display:none" id="confirm_password_error"><span />
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary w-100" id="password_button"
                        onclick="resetPasswordSave();">
                        {{ __('Update Password') }}
                        <span class="spinner-border spinner-border-sm d-none ms-1" role="status"
                            id="password_loader"></span>
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

        function resetPasswordSave() {
            $("#password_button").addClass("disabled btn-loading");
            $("#password_loader").removeClass("d-none");
            var form = $("#reset_password")[0];
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('password.update') }}",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == false && response.flag == false) {
                        $.each(response.errors, function(key, value) {
                            $("#" + key).addClass('is-invalid');
                            $("#" + key + "_error").text(value).show();
                        });

                        $("#password_button").removeClass("disabled btn-loading");
                        $("#password_loader").addClass("d-none");

                        setTimeout(function() {
                            $.each(response.errors, function(key) {
                                $("#" + key).removeClass('is-invalid');
                                $("#" + key + "_error").hide();
                            });
                        }, 9000);
                        $("#reset_password")[0].reset();
                    } else if (response.status == false && response.flag == 'user_not_found') {
                        $("#password_button").removeClass("disabled btn-loading");
                        $("#password_loader").addClass("d-none");
                        new Toast({
                            title: response.msg || "User not found!",
                            type: "error",
                            position: "top-center"
                        }).show();
                        $("#reset_password")[0].reset();
                    } else {
                        $("#password_button").removeClass("disabled btn-loading");
                        $("#password_loader").addClass("d-none");
                        $("#reset_password")[0].reset();
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    handleAjaxError(xhr, {
                        formSelector: '#reset_password',
                        buttonSelector: '#password_button',
                        loaderSelector: '#password_loader',
                        fallbackMessage: 'Password Update failed.'
                    });
                }
            });
        }
    </script>
@endsection
