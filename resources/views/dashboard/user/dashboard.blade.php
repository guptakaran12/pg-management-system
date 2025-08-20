@extends('dashboard.layout')
@section('title', 'Dashboard | PG Management System')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">{{ __('User Dashboard') }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html.htm">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('User Dashboard') }}</li>
                        </ol>
                    </nav>
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
                                        <a href="profile.html.htm"
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
        </div>
    </div>
@endsection
