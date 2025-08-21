@extends('dashboard.layout')
@section('title', 'Dashboard - User List | PG Management System')
@section('content')
    <div class="page-wrapper" style="min-height: 915px;">
        <div class="content">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">{{ __('User List') }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                {{ __('Users') }}
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('All Users') }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="pe-1 mb-2">
                        <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                            data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                            <i class="ti ti-refresh"></i>
                        </a>
                    </div>
                    <div class="pe-1 mb-2">
                        <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                            data-bs-placement="top" aria-label="Print" data-bs-original-title="Print">
                            <i class="ti ti-printer"></i>
                        </button>
                    </div>
                    <div class="dropdown me-2 mb-2">
                        <a href="javascript:void(0);"
                            class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="ti ti-file-export me-2"></i>{{ __('Export') }}
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                        class="ti ti-file-type-pdf me-2"></i>{{ __('Export as PDF') }}</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                        class="ti ti-file-type-xls me-2"></i>{{ __('Export as Excel') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('users.create') }}" class="btn btn-primary d-flex align-items-center"><i
                                class="ti ti-square-rounded-plus me-2"></i>{{ __('Add User') }}</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Students List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">{{ __('Users List') }}</h4>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="input-icon-start mb-3 me-2 position-relative">
                            <span class="icon-addon">
                                <i class="ti ti-calendar"></i>
                            </span>
                            <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                                value="Academic Year : 2024 / 2025">
                        </div>
                        <div class="dropdown mb-3 me-2">
                            <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                    class="ti ti-filter me-2"></i>{{ __('Filter') }}</a>
                            <div class="dropdown-menu drop-width">
                                <form action="students.html">
                                    <div class="d-flex align-items-center border-bottom p-3">
                                        <h4>{{ __('Filter') }}</h4>
                                    </div>
                                    <div class="p-3 pb-0 border-bottom">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Class</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="1"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="3">Select</option>
                                                        <option>I</option>
                                                        <option>II</option>
                                                        <option>III</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="2" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true" aria-expanded="false"
                                                                tabindex="0" aria-disabled="false"
                                                                aria-labelledby="select2-q8ka-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-q8ka-container" role="textbox"
                                                                    aria-readonly="true" title="Select">Select</span><span
                                                                    class="select2-selection__arrow" role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Section</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="4"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="6">Select</option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="5" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-j4dy-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-j4dy-container" role="textbox"
                                                                    aria-readonly="true" title="Select">Select</span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="7"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="9">Select</option>
                                                        <option>Janet</option>
                                                        <option>Joann</option>
                                                        <option>Kathleen</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="8" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-4u96-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-4u96-container" role="textbox"
                                                                    aria-readonly="true" title="Select">Select</span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="10"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="12">Select</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="11" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-rt0t-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-rt0t-container" role="textbox"
                                                                    aria-readonly="true" title="Select">Select</span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="13"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option data-select2-id="15">Select</option>
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="14" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-wass-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-wass-container" role="textbox"
                                                                    aria-readonly="true" title="Select">Select</span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 d-flex align-items-center justify-content-end">
                                        <a href="#" class="btn btn-light me-3">{{ __('Reset') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('Apply') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center bg-white border rounded-2 p-1 mb-3 me-2">
                            <a href="students.html" class="active btn btn-icon btn-sm me-1 primary-hover"><i
                                    class="ti ti-list-tree"></i></a>
                            <a href="student-grid.html" class="btn btn-icon btn-sm bg-light primary-hover"><i
                                    class="ti ti-grid-dots"></i></a>
                        </div>
                        <div class="dropdown mb-3">
                            <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                data-bs-toggle="dropdown"><i
                                    class="ti ti-sort-ascending-2 me-2"></i>{{ __('Sort by A-Z') }}
                            </a>
                            <ul class="dropdown-menu p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                        {{ __('Ascending') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                        {{ __('Descending') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                        {{ __('Recently Viewed') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                        {{ __('Recently Added') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 py-3">

                    <!-- Student List -->
                    <div class="custom-datatable-filter table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                            <div class="row dt-row">
                                <div class="col-sm-12 table-responsive">
                                    <table class="table datatable dataTable no-footer" id="DataTables_Table_0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="no-sort sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label=": activate to sort column descending"
                                                    style="width: 31.2812px;">
                                                    <div class="form-check form-check-md">
                                                        <input class="form-check-input" type="checkbox" id="select-all">
                                                    </div>
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Admission No: activate to sort column ascending"
                                                    style="width: 109.609px;">{{ __('User Id') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Roll No: activate to sort column ascending"
                                                    style="width: 59.625px;">{{ __('Full Name') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Name: activate to sort column ascending"
                                                    style="width: 117.438px;">{{ __('Profile Image') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Class : activate to sort column ascending"
                                                    style="width: 47.2656px;">{{ __('Email') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Section: activate to sort column ascending"
                                                    style="width: 61.9688px;">{{ __('Phone Number') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Gender: activate to sort column ascending"
                                                    style="width: 60.2188px;">{{ __('Gender') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 82.9531px;">{{ __('DOB (Date of Birth)') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Date of Join: activate to sort column ascending"
                                                    style="width: 98.7812px;">{{ __('Date of Join') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="DOB: activate to sort column ascending"
                                                    style="width: 100.844px;">{{ __('Role') }}</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 337.016px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($userList as $user)
                                                <tr class="odd">
                                                    <td class="sorting_1">
                                                        <div class="form-check form-check-md">
                                                            <input class="form-check-input" type="checkbox">
                                                        </div>
                                                    </td>
                                                    <td><a href="#" class="link-primary">
                                                            #{{ isset($user->id) ? $user->id : '' }}</a>
                                                    </td>
                                                    <td> {{ isset($user->full_name) ? $user->full_name : '' }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                style="width:40px; height:40px; overflow:hidden; border-radius:50%;">
                                                                <img src="{{ isset($user->profile_image) && $user->profile_image
                                                                    ? asset('storage/profile_images/' . $user->profile_image)
                                                                    : asset('assets/img/authentication/user.png') }}"
                                                                    alt="Profile Image"
                                                                    style="width:100%; height:100%; object-fit:cover; object-position:center;">
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>{{ isset($user->email) ? $user->email : '' }}</td>
                                                    <td>{{ isset($user->phone_number) ? $user->phone_number : '' }}</td>
                                                    <td>{{ isset($user->gender) ? $user->gender : '' }}</td>
                                                    <td>
                                                        {{ isset($user->dob) ? $user->dob : '' }}
                                                    </td>
                                                    <td>{{ isset($user->join_date) ? $user->join_date : '' }}</td>
                                                    <td>{{ isset($user->role) ? $user->role : '' }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#"
                                                                class="btn btn-outline-light bg-white btn-icon d-flex align-items-center justify-content-center rounded-circle  p-0 me-2"><i
                                                                    class="ti ti-brand-hipchat"></i></a>
                                                            <a href="#"
                                                                class="btn btn-outline-light bg-white btn-icon d-flex align-items-center justify-content-center rounded-circle  p-0 me-2"><i
                                                                    class="ti ti-phone"></i></a>
                                                            <a href="#"
                                                                class="btn btn-outline-light bg-white btn-icon d-flex align-items-center justify-content-center rounded-circle p-0 me-3"><i
                                                                    class="ti ti-mail"></i></a>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#add_fees_collect"
                                                                class="btn btn-light fs-12 fw-semibold me-3">Collect
                                                                Fees</a>
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="btn btn-white btn-icon btn-sm d-flex align-items-center justify-content-center rounded-circle p-0"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ti ti-dots-vertical fs-14"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-right p-3">
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1"
                                                                            href="student-details.html"><i
                                                                                class="ti ti-menu me-2"></i>View
                                                                            Student</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1"
                                                                            href="edit-student.html"><i
                                                                                class="ti ti-edit-circle me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#login_detail"><i
                                                                                class="ti ti-lock me-2"></i>Login
                                                                            Details</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1"
                                                                            href="javascript:void(0);"><i
                                                                                class="ti ti-toggle-right me-2"></i>Disable</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1"
                                                                            href="student-promotion.html"><i
                                                                                class="ti ti-arrow-ramp-right-2 me-2"></i>Promote
                                                                            Student</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item rounded-1" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete-modal"><i
                                                                                class="ti ti-trash-x me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Student List -->
                </div>
            </div>
            <!-- /Students List -->

        </div>
    </div>
@endsection

@section('scripts')

@endsection
