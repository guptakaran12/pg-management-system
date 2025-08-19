<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Preskool - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
    <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/feather/feather.css') }}">
    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Toaster -->
    <link href="{{ asset('assets/css/toaster.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="container-fuild">
            <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
                <div class="row">
                    <div class="col-lg-6">
                        <div
                            class="login-background position-relative d-lg-flex align-items-center justify-content-center d-lg-block d-none flex-wrap vh-100 overflowy-auto">
                            <div>
                                <img src="{{ asset('assets/img/authentication/authentication-02.jpg') }}"
                                    alt="Img">
                            </div>
                            <div class="authen-overlay-item  w-100 p-4">
                                <h4 class="text-white mb-3">{{ __("What's New in PG System") }} !!!</h4>
                                <div
                                    class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>{{ __('New Resident Registration Open') }}</h6>
                                        <p class="mb-0 text-truncate">
                                            {{ __('Now you can easily register new residents with complete KYC..') }}
                                        </p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                                <div
                                    class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>{{ __('Online Rent Payment') }}</h6>
                                        <p class="mb-0 text-truncate">
                                            {{ __('Residents can now pay their monthly rent directly through the PG...') }}
                                        </p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                                <div
                                    class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>{{ __('Visitor Log Management') }}</h6>
                                        <p class="mb-0 text-truncate">
                                            {{ __('Track and manage visitors coming in and out of the PG with proper...') }}
                                        </p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                                <div
                                    class="d-flex align-items-center flex-row mb-3 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>{{ __('Staff Duty Allocation') }}</h6>
                                        <p class="mb-0 text-truncate">
                                            {{ __('Easily assign cleaning, cooking, and security duties to staff members...') }}
                                        </p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                                <div
                                    class="d-flex align-items-center flex-row mb-0 justify-content-between p-3 br-5 gap-3 card">
                                    <div>
                                        <h6>{{ __('Maintenance Requests') }}</h6>
                                        <p class="mb-0 text-truncate">
                                            {{ __('Residents can raise maintenance requests online for quick resolution...') }}
                                        </p>
                                    </div>
                                    <a href="javascript:void(0);"><i class="ti ti-chevrons-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                            <div class="col-md-8 mx-auto p-4">
                                <div>
                                    <div class=" mx-auto mb-5 text-center w-50">
                                        <img src="{{ asset('assets/img/authentication/authentication-logo.svg') }}"
                                            class="img-fluid" alt="Logo">
                                    </div>
                                    {{-- Session Toaster --}}
                                    @include('toaster.session_layout')
                                    @yield('content')
                                    <div class="mt-5 text-center">
                                        <p class="mb-0 ">{{ __('Copyright &copy; 2025 - PG System') }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
    <!-- Toaster  -->
    <script src="{{ asset('assets/js/toaster.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="f19a5d31f16a43968ae06db1-text/javascript"></script>
    <!-- Feather Icon JS -->
    <script src="{{ asset('assets/js/feather.min.js') }}" type="f19a5d31f16a43968ae06db1-text/javascript"></script>
    <!-- Slimscroll JS -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="f19a5d31f16a43968ae06db1-text/javascript"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="f19a5d31f16a43968ae06db1-text/javascript"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}" type="f19a5d31f16a43968ae06db1-text/javascript"></script>
    @yield('script')
</body>

</html>
