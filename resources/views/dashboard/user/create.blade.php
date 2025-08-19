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
                                <a href="index.html.htm">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="students.html.htm">{{ __('User') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Add User') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <form action="students.html">
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
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                                <div
                                                    class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                    <img src="{{ asset('assets/img/authentication/user.png') }}"
                                                        class="rounded-circle img-fluid" alt="Profile Photo"
                                                        id="profile_view">

                                                </div>
                                                <div class="profile-upload">
                                                    <div class="profile-uploader d-flex align-items-center">
                                                        <div class="drag-upload-btn mb-3">
                                                            {{ __('Upload') }}
                                                            <input type="file" class="form-control image-sign"
                                                                id="profile_image"
                                                                onchange="handleFileUpload(this, 'profile')">
                                                        </div>
                                                        <a href="javascript:void(0);" id="remove"
                                                            class="btn btn-primary mb-3" style="display:none"
                                                            onclick="removePhotoOrFiles();">{{ __('Remove') }}</a>
                                                    </div>
                                                    <p class="fs-12">
                                                        {{ __('Upload image size 4MB, Format JPG, PNG, SVG') }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Full Name -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="full_name">{{ __('Full Name') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="full_name" id="full_name"
                                                    maxlength="50" autofocus>
                                                <span class="text-danger fw-bold" id="full_name_error"
                                                    style="display:none"></span>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">{{ __('Email Address') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    maxlength="50">
                                                <span class="text-danger fw-bold" id="email_error"
                                                    style="display:none"></span>
                                            </div>
                                        </div>

                                        <!-- DOB -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="dob">{{ __('Date Of Birth') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="input-icon position-relative">
                                                    <span class="input-icon-addon">
                                                        <i class="ti ti-calendar"></i>
                                                    </span>
                                                    <input type="text" name="dob" id="dob"
                                                        class="form-control datetimepicker">
                                                    <span class="text-danger fw-bold" id="dob_error"
                                                        style="display:none"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-lg-3 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="gender">{{ __('Gender') }}
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="select" name="gender" id="gender">
                                                    <option>{{ __('Select') }}</option>
                                                    <option value="male">{{ __('Male') }}</option>
                                                    <option value="female">{{ __('Female') }}</option>
                                                </select>
                                                <span class="text-danger fw-bold" id="gender_error"
                                                    style="display:none"></span>
                                            </div>
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
                                            <span class="text-danger fw-bold" style="display:none"
                                                id="current_address_error">*</span>
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
                                                style="display:none"></span>
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
                                                style="display:none"></span>
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
                                            <select class="select" name="role" id="role">
                                                <option>{{ __('Select') }}</option>
                                                <option value="admin">{{ __('Admin ') }}</option>
                                                <option value="resident">{{ __('Resident ') }}</option>
                                                <option value="staff">{{ __('Staff ') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="role_error"
                                                style="display:none"></span>
                                        </div>
                                    </div>

                                    <!-- UserName -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">{{ __('UserName') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                maxlength="50">
                                            <span class="text-danger fw-bold" id="username_error"
                                                style="display:none"></span>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="password">{{ __('Password') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                maxlength="30">
                                            <span class="text-danger fw-bold" id="password_error"
                                                style="display:none"></span>
                                        </div>
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
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch">
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
                                            <select class="select" id="proof_type" name="proof_type">
                                                <option>{{ __('Select') }}</option>
                                                <option value="aadhaar">{{ __('Aadhaar') }}</option>
                                                <option value="pan">{{ __('PAN') }}</option>
                                                <option value="dl">{{ __('DL') }}</option>
                                                <option value="passport">{{ __('Passport') }}</option>
                                            </select>
                                            <span class="text-danger fw-bold" id="proof_type_error"
                                                style="display:none"></span>
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
                                                style="display:none"></span>
                                        </div>
                                    </div>

                                    <!-- Id Proof File -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label mb-1" for="file">{{ __('Document') }}</label>
                                            <p class="small text-muted">Upload file up to 4MB, Accepted Format: PDF/JPG/PNG
                                            </p>

                                            <!-- Custom Upload Box -->
                                            <div
                                                class="upload-box text-center p-4 border rounded shadow-sm position-relative">
                                                <i class="ti ti-file-upload fs-2 text-primary mb-2"></i>
                                                <p class="mb-1">Drag & Drop or <span
                                                        class="text-primary fw-bold">Browse</span></p>
                                                <small class="text-muted">PDF, JPG, PNG only</small>
                                                <input type="file" id="documents" multiple
                                                    accept=".pdf,.jpg,.jpeg,.png"
                                                    class="form-control image_sign position-absolute top-0 start-0 w-100 h-100 opacity-0"
                                                    name="file" id="file"
                                                    onchange="handleFileUpload(this, 'documents')">
                                            </div>

                                            <!-- Preview Selected Files -->
                                            <ul class="list-group mt-2" id="document_list"></ul>

                                            <span class="text-danger fw-bold" id="proof_number_error"
                                                style="display:none"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Documents Information -->

                        <div class="text-end">
                            <button type="button" class="btn btn-light me-3">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Add User') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@section('script')
    <script>
        const defaultProfile = "{{ asset('assets/img/authentication/user.png') }}";
        let uploadedDocs = []; // global array to hold files

        // Handle both Profile and Documents
        function handleFileUpload(input, type) {
            let files = Array.from(input.files);

            if (type === 'profile') {
                if (files && files[0]) {
                    let file = files[0];
                    let allowed = ["image/jpeg", "image/png", "image/svg+xml"];

                    if ($.inArray(file.type, allowed) === -1) {
                        alert("Only JPG, PNG, or SVG files are allowed.");
                        $(input).val("");
                        return;
                    }

                    if (file.size > 4 * 1024 * 1024) {
                        alert("Profile image must be less than 4MB.");
                        $(input).val("");
                        return;
                    }

                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $("#profile_view").attr("src", e.target.result);
                        $("#remove_profile").show();
                    };
                    reader.readAsDataURL(file);
                }
            }

            if (type === 'documents') {
                // Merge new files with old ones
                uploadedDocs = uploadedDocs.concat(files);

                // Restrict to max 4
                if (uploadedDocs.length > 4) {
                    alert("You can upload a maximum of 4 documents.");
                    uploadedDocs = uploadedDocs.slice(0, 4); // keep only first 4
                }

                // Clear list before rendering
                $("#document_list").empty();

                // Render all files
                $.each(uploadedDocs, function(index, file) {
                    let allowed = ["application/pdf", "image/jpeg", "image/png"];
                    if ($.inArray(file.type, allowed) === -1) {
                        alert(file.name + " is not allowed. Only PDF, JPG, PNG are accepted.");
                        uploadedDocs.splice(index, 1); // remove invalid file
                        return;
                    }

                    if (file.size > 4 * 1024 * 1024) {
                        alert(file.name + " is larger than 4MB.");
                        uploadedDocs.splice(index, 1); // remove big file
                        return;
                    }

                    let icon = "ti ti-file fs-5 text-primary";
                    if (file.type === "application/pdf") icon = "ti ti-file-text fs-5 text-danger";
                    if (file.type.startsWith("image/")) icon = "ti ti-photo fs-5 text-success";

                    let sizeKB = (file.size / 1024).toFixed(1);

                    $("#document_list").append(`
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div><i class="${icon} me-2"></i>${file.name}</div>
                        <span class="badge bg-secondary">${sizeKB} KB</span>
                    </li>
                `);
                });

                // Reset input so next time same file can also be selected
                $(input).val("");
            }
        }

        // Remove profile photo -> back to default
        function removePhotoOrFiles() {
            $("#profile_view").attr("src", defaultProfile);
            $("#profile_image").val("");
            $("#remove_profile").hide();
        }
    </script>

@endsection
