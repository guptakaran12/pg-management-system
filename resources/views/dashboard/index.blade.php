@extends('dashboard.layout')
@section('title', 'Dashboard | PG Management System')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">{{ __('Admin Dashboard') }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Admin Dashboard') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="mb-2">
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center me-3"><i
                                class="ti ti-square-rounded-plus me-2"></i>{{ __('Add New User') }}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Dashboard Content -->
                    <div class="card bg-dark">
                        <div class="overlay-img">
                            <img src="{{ asset('assets/img/bg/shape-04.png') }}" alt="img" class="img-fluid shape-01">
                            <img src="{{ __('assets/img/bg/shape-01.png') }}" alt="img" class="img-fluid shape-02">
                            <img src="{{ asset('assets/img/bg/shape-02.png') }}" alt="img" class="img-fluid shape-03">
                            <img src="{{ asset('assets/img/bg/shape-03.png') }}" alt="img" class="img-fluid shape-04">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-xl-center justify-content-xl-between flex-xl-row flex-column">
                                <div class="mb-3 mb-xl-0">
                                    <div class="d-flex align-items-center flex-wrap mb-2">
                                        <h1 class="text-white me-2">{{ __('Welcome Back,') }}
                                            {{ Auth::user()->full_name ?? '' }}</h1>
                                        <a href="#"
                                            class="avatar avatar-sm img-rounded bg-gray-800 dark-hover"><i
                                                class="ti ti-edit text-white"></i></a>
                                    </div>
                                    <p class="text-white">Have a Good day at work</p>
                                </div>
                                <p class="text-white"><i class="ti ti-refresh me-1"></i>Updated Recently on 15 Jun
                                    2024</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Dashboard Content -->

                </div>
            </div>

            <div class="row">

                <!-- Total Users -->
                <div class="col-xxl-3 col-sm-6 d-flex">
                    <div class="card flex-fill animate-card border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl bg-danger-transparent me-2 p-1">
                                    <img src="{{ asset('assets/img/authentication/user.png') }}" alt="img">
                                </div>
                                <div class="overflow-hidden flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h2 class="counter">{{ isset($totalUsers) ? $totalUsers : '0' }}</h2>
                                        <span
                                            class="badge bg-danger">{{ isset($activePercent) ? $activePercent : '0' }}%</span>
                                    </div>
                                    <p>{{ __('Total Users') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between border-top mt-3 pt-3">
                                <p class="mb-0">{{ __('Active') }} : <span
                                        class="text-dark fw-semibold">{{ isset($activeUsers) ? $activeUsers : '0' }}</span>
                                </p>
                                <span class="text-light">|</span>
                                <p>{{ __('Inactive') }} : <span
                                        class="text-dark fw-semibold">{{ isset($inactiveUsers) ? $inactiveUsers : '0' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Total Users -->
            </div>
        </div>
    </div>
@endsection
