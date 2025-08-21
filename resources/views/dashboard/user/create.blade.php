@extends('dashboard.layout')
@section('title', 'Dashboard - Add User | PG Management System')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{ __('Add User') }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">{{ __('User') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Add User') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <form id="user_form" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Details -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-user-shield fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">{{ __('Personal Details') }}</h4>
                                </div>
                            </div>
                            <div class="card-body pb-0">
                                <div class="border-bottom mb-3">
                                    <h5 class="mb-3">{{ __('Profile Photo') }}</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div
                                                    class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed text-dark frames">
                                                    <img src="{{ asset('assets/img/authentication/user.png') }}"
                                                        class="rounded-circle img-fluid" alt="Profile Photo"
                                                        id="profile_view">
                                                </div>
                                                <div class="profile-upload">
                                                    <div class="profile-uploader d-flex align-items-center">
                                                        <div class="drag-upload-btn">
                                                            {{ __('Upload') }}
                                                            <input type="file" class="form-control" id="profile_image"
                                                                accept=".jpg,.jpeg,.png,.svg" name="profile_image"
                                                                onchange="handleFiles(this, 'profile')">
                                                        </div>
                                                        <a href="javascript:void(0);" id="remove_profile"
                                                            class="btn btn-primary ms-2" style="display:none"
                                                            onclick="handleFiles(null, 'profile', 0)">{{ __('Remove') }}</a>
                                                    </div>
                                                    <p class="fs-12 mt-1">
                                                        {{ __('Upload image size 4MB, Format JPG, PNG, SVG') }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Full Name -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label" for="full_name">{{ __('Full Name') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="full_name" id="full_name"
                                                maxlength="50" autofocus
                                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                            <span class="text-danger fw-bold" id="full_name_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label" for="email">{{ __('Email Address') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                maxlength="50">
                                            <span class="text-danger fw-bold" id="email_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>

                                        <!-- DOB -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label" for="dob">{{ __('Date Of Birth') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-icon position-relative">
                                                <input type="text" name="dob" id="dob"
                                                    class="form-control datetimepicker" style="padding-right: 38px;">
                                                <!-- text icon  -->
                                                <span class="input-icon-addon"
                                                    style="right: 14px; position: absolute; top: 50%; transform: translateY(-50%);">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                            </div>
                                            <span class="text-danger fw-bold" id="dob_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>

                                        <!-- Joining DOB -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label" for="dob">{{ __('Joining Date') }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-icon position-relative">
                                                <span class="input-icon-addon"
                                                    style="right: 14px; position: absolute; top: 50%; transform: translateY(-50%);"><i
                                                        class="ti ti-calendar"></i></span>
                                                <input type="text" name="joining_date" id="joining_date"
                                                    class="form-control datetimepicker">
                                            </div>
                                            <span class="text-danger fw-bold" id="joining_date_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <label class="form-label" for="gender">{{ __('Gender') }} <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option>{{ __('Select') }}</option>
                                                <option value="male">{{ __('Male') }}</option>
                                                <option value="female">{{ __('Female') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="gender_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Personal Details -->

                        <!-- Contact Details -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-map fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">{{ __('Address Details') }}</h4>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <div class="row">
                                    <!-- Current Address -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="current_address">{{ __('Current Address') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="current_address"
                                                id="current_address" maxlength="250">
                                            <span class="text-danger fw-bold"
                                                style="display:none; padding-top:4px; display:inline-block;"
                                                id="current_address_error"></span>
                                        </div>
                                    </div>

                                    <!-- Peramenet Address -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="permanent_address">{{ __('Permanent Address') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="permanent_address"
                                                name="permanent_address" maxlength="250">
                                            <span class="text-danger fw-bold" id="permanent_address_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone_number">{{ __('Phone Number') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="tel" class="form-control" name="phone_number"
                                                id="phone_number"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                            <span class="text-danger fw-bold" id="phone_number_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Contact Details -->

                        <!-- Account Details -->
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-user-circle fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">{{ __('Account Details') }}</h4>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <div class="row">
                                    <!-- Role -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="role">{{ __('Role') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="">{{ __('Select') }}</option>
                                                <option value="admin">{{ __('Admin ') }}</option>
                                                <option value="resident">{{ __('Resident ') }}</option>
                                                <option value="staff">{{ __('Staff ') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="role_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- Status  -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="status">{{ __('Status') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="">{{ __('Status') }}</option>
                                                <option value="active">{{ __('Active ') }}</option>
                                                <option value="inactive">{{ __('Inactive') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="status_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- UserName -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">{{ __('UserName') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
                                            <span class="text-danger fw-bold" id="username_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-4">
                                        <div class="position-relative">
                                            <label class="form-label" for="password">{{ __('Password') }}
                                                <span class="text-danger">*</span>
                                            </label>

                                            <input type="password" class="form-control pe-5" name="password"
                                                id="password" maxlength="30">

                                            <!-- Eye Icon inside input -->
                                            <span toggle="#password" class="ti ti-eye-off toggle-password-icon"
                                                style="position:absolute; right:25px; top:73%; transform:translateY(-50%); cursor:pointer;"></span>
                                        </div>
                                        <span class="text-danger fw-bold" id="password_error"
                                            style="display:none; padding-top:4px; display:inline-block;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Account Details -->

                        <!-- Documents Details  -->
                        <div class="card">
                            <div class="card-header bg-light d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                        <i class="ti ti-file-description fs-16"></i>
                                    </span>
                                    <h4 class="text-dark">{{ __('Documents Details') }}</h4>
                                </div>
                            </div>
                            <div class="card-body pb-1">
                                <div class="row">
                                    <!-- Id Proof Type  -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="proof_type">{{ __('ID Proof Type') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="proof_type" name="proof_type">
                                                <option value="">{{ __('Select') }}</option>
                                                <option value="aadhaar">{{ __('Aadhaar') }}</option>
                                                <option value="pan">{{ __('PAN') }}</option>
                                                <option value="dl">{{ __('DL') }}</option>
                                                <option value="passport">{{ __('Passport') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="proof_type_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- Id Number -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="proof_number">{{ __('ID Proof Number') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="proof_number"
                                                id="proof_number" maxlength="20"
                                                oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();">
                                            <span class="text-danger fw-bold" id="proof_number_error"
                                                style="display:none; padding-top:4px; display:inline-block;"></span>
                                        </div>
                                    </div>

                                    <!-- Id Proof File -->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label mb-1" for="file">{{ __('Document') }}</label>
                                            <p class="small text-muted">
                                                Upload file up to 4MB, Accepted Format: PDF/JPG/PNG
                                            </p>

                                            <div class="row g-2">
                                                <!-- Upload Box -->
                                                <div class="col-md-6">
                                                    <div
                                                        class="upload-box text-center p-4 border rounded shadow-sm position-relative h-100">
                                                        <i class="ti ti-file-upload fs-2 text-primary mb-2"></i>
                                                        <p class="mb-1">Drag & Drop or <span
                                                                class="text-primary fw-bold">Browse</span></p>
                                                        <small class="text-muted">PDF, JPG, PNG only</small>
                                                        <input type="file" id="documents" multiple
                                                            accept=".pdf,.jpg,.jpeg,.png"
                                                            class="form-control image_sign position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                            name="documents[]"
                                                            onchange="handleFiles(this, 'document_list')">
                                                    </div>
                                                </div>

                                                <!-- Preview List -->
                                                <div class="col-md-6">
                                                    <ul class="list-group" id="document_list"></ul>
                                                </div>
                                            </div>

                                            <span class="text-danger fw-bold my-2" id="documents_error"
                                                style="display:none"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Documents Information -->

                        <div class="text-end">
                            <button type="button" class="btn btn-light me-3">{{ __('Cancel') }}</button>
                            <button type="button" class="btn btn-primary" id="user_button"
                                onclick="saveUser();">{{ __('Add User') }}
                                <span class="spinner-border spinner-border-sm d-none ms-1" role="status"
                                    id="user_loader"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
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
                $(this).removeClass('ti-eye-off').addClass('ti-eye');
            } else {
                input.attr('type', 'password');
                $(this).removeClass('ti-eye').addClass('ti-eye-off');
            }
        });

        let uploadedFiles = {};

        function handleFiles(input, listId, removeIndex = null) {
            if (!uploadedFiles[listId]) {
                uploadedFiles[listId] = [];
            }

            // Remove case
            if (removeIndex !== null) {
                uploadedFiles[listId].splice(removeIndex, 1);
            }

            // Add case
            else if (input && input.files) {
                let files = Array.from(input.files);
                let allowedDocs = ["application/pdf", "image/jpeg", "image/png"];
                let allowedImages = ["image/jpeg", "image/png", "image/svg+xml"];

                files.forEach(file => {
                    if (listId === "document_list") {
                        if (!allowedDocs.includes(file.type)) {
                            new Toast({
                                title: "Invalid file type",
                                type: "error",
                                position: "top-center"
                            }).show();
                            return;
                        }

                        if (uploadedFiles[listId].length >= 4) {
                            new Toast({
                                title: "You can upload maximum 4 documents only!",
                                type: "error",
                                position: "top-center"
                            }).show();
                            return;
                        }

                        uploadedFiles[listId].push(file);
                    } else if (listId === "profile") {
                        if (allowedImages.includes(file.type)) {
                            uploadedFiles[listId] = [file];
                        } else {
                            new Toast({
                                title: "Invalid image type",
                                type: "error",
                                position: "top-center"
                            }).show();
                        }
                    }
                });
            }

            if (input) input.value = "";

            if (listId === "document_list") {
                let list = document.getElementById(listId);
                list.innerHTML = "";
                uploadedFiles[listId].forEach((file, index) => {
                    let li = document.createElement("li");
                    li.className = "list-group-item d-flex justify-content-between align-items-center";
                    // file icon
                    let icon = "";
                    if (file.type === "application/pdf") {
                        icon = `<i class="ti ti-file-text text-danger me-2"></i>`;
                    } else if (file.type.startsWith("image/")) {
                        icon = `<i class="ti ti-photo text-primary me-2"></i>`;
                    }
                    li.innerHTML = `
                        <div class="d-flex align-items-center">
                            ${icon}
                            <span>${file.name} <small class="text-muted">(${(file.size / 1024).toFixed(1)} KB)</small></span>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger"
                            onclick="handleFiles(null, '${listId}', ${index})">
                            <i class="ti ti-x"></i>
                        </button>
                    `;
                    list.appendChild(li);
                });
            } else if (listId === "profile") {
                let img = document.getElementById("profile_view");
                let removeBtn = document.getElementById("remove_profile");

                if (uploadedFiles[listId].length > 0) {
                    let file = uploadedFiles[listId][0];
                    img.src = URL.createObjectURL(file);
                    removeBtn.style.display = "inline-block";
                } else {
                    img.src = "{{ asset('assets/img/authentication/user.png') }}";
                    removeBtn.style.display = "none";
                }
            }
        }

        function saveUser() {
            $("#user_button").addClass("disabled btn-loading");
            $("#user_loader").removeClass("d-none");
            var form = $("#user_form")[0];
            var formData = new FormData(form);

            if (uploadedFiles["profile"] && uploadedFiles["profile"].length > 0) {
                formData.append("profile_image", uploadedFiles["profile"][0]);
            }

            if (uploadedFiles["document_list"] && uploadedFiles["document_list"].length > 0) {
                uploadedFiles["document_list"].forEach((file, index) => {
                    formData.append("documents[]", file);
                });
            }

            $.ajax({
                url: "{{ route('save.user') }}",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == false) {
                        $.each(response.errors, function(key, value) {
                            $("#" + key).addClass('is-invalid');
                            $("#" + key + "_error").text(value).show();
                        });

                        $("#user_button").removeClass("disabled btn-loading");
                        $("#user_loader").addClass("d-none");

                        setTimeout(function() {
                            $.each(response.errors, function(key) {
                                $("#" + key).removeClass('is-invalid');
                                $("#" + key + "_error").hide();
                            });
                        }, 7000);
                    } else {
                        $("#user_button").removeClass("disabled btn-loading");
                        $("#user_loader").addClass("d-none");
                        $("#user_form")[0].reset();
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    handleAjaxError(xhr, {
                        formSelector: '#user_form',
                        buttonSelector: '#user_button',
                        loaderSelector: '#user_loader',
                        fallbackMessage: 'User Add failed.'
                    });
                }
            });
        }
    </script>
@endsection
