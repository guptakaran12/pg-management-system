       <!-- Header -->
       <div class="header">
           <!-- Logo -->
           <div class="header-left active">
               <a href="{{ route('dashboard.index') }}" ass="logo logo-normal">
                   <img src="{{ asset('assets/img/logo.svg') }}" alt="Logo">
               </a>
               <a href="{{ route('dashboard.index') }}" class="logo-small">
                   <img src="{{ asset('assets/img/logo-small.svg') }}" alt="Logo">
               </a>
               <a href="{{ route('dashboard.index') }}" class="dark-logo">
                   <img src="{{ asset('assets/img/logo-dark.svg') }}" alt="Logo">
               </a>
               <a id="{{ route('dashboard.index') }}" href="javascript:void(0);">
                   <i class="ti ti-menu-deep"></i>
               </a>
           </div>
           <!-- /Logo -->

           <a id="mobile_btn" class="mobile_btn" href="#sidebar">
               <span class="bar-icon">
                   <span></span>
                   <span></span>
                   <span></span>
               </span>
           </a>

           <div class="header-user">
               <div class="nav user-menu">

                   <!-- Search -->
                   <div class="nav-item nav-search-inputs me-auto">
                       <div class="top-nav-search">
                           <a href="javascript:void(0);" class="responsive-search">
                               <i class="fa fa-search"></i>
                           </a>
                           <form action="#" class="dropdown">
                               <div class="searchinputs" id="dropdownMenuClickable">
                                   <input type="text" placeholder="Search">
                                   <div class="search-addon">
                                       <button type="submit"><i class="ti ti-command"></i></button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
                   <!-- /Search -->

                   <div class="d-flex align-items-center">
                       <div class="pe-1 ms-1">
                           <div class="dropdown">
                               <a href="#"
                                   class="btn btn-outline-light bg-white btn-icon d-flex align-items-center me-1 p-2"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <img src="{{ asset('assets/img/flags/us.png') }}" alt="Language"
                                       class="img-fluid rounded-pill">
                               </a>
                               <div class="dropdown-menu dropdown-menu-right">
                                   <a href="javascript:void(0);" class="dropdown-item active d-flex align-items-center">
                                       <img class="me-2 rounded-pill" src="{{ asset('assets/img/flags/us.png') }}"
                                           alt="Img" height="22" width="22"> {{ __('English') }}
                                   </a>
                                   <a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">
                                       <img class="me-2 rounded-pill" src="{{ asset('assets/img/flags/in.png') }}"
                                           alt="India Flag" height="22" width="22"> {{ __('India') }}
                                   </a>
                               </div>
                           </div>
                       </div>
                       <div class="pe-1">
                           <div class="dropdown">
                               <a href="#" class="btn btn-outline-light bg-white btn-icon me-1"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="ti ti-square-rounded-plus"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right border shadow-sm dropdown-md">
                                   <div class="p-3 border-bottom">
                                       <h5>Add New</h5>
                                   </div>
                                   <div class="p-3 pb-0">
                                       <div class="row gx-2">

                                           <div class="col-6">
                                               <a href="add-teacher.html.htm"
                                                   class="d-block bg-success-transparent ronded p-2 text-center mb-3 class-hover">
                                                   <div class="avatar avatar-lg mb-2">
                                                       <span
                                                           class="d-inline-flex align-items-center justify-content-center w-100 h-100 bg-success rounded-circle"><i
                                                               class="ti ti-users"></i></span>
                                                   </div>
                                                   <p class="text-dark">{{ __('Users') }}</p>
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="pe-1">
                           <a href="#" id="dark-mode-toggle"
                               class="dark-mode-toggle activate btn btn-outline-light bg-white btn-icon me-1">
                               <i class="ti ti-moon"></i>
                           </a>
                           <a href="#" id="light-mode-toggle"
                               class="dark-mode-toggle btn btn-outline-light bg-white btn-icon me-1">
                               <i class="ti ti-brightness-up"></i>
                           </a>
                       </div>
                       <div class="pe-1" id="notification_item">
                           <a href="#" class="btn btn-outline-light bg-white btn-icon position-relative me-1"
                               id="notification_popup">
                               <i class="ti ti-bell"></i>
                               <span class="notification-status-dot"></span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4">
                               <div
                                   class="d-flex align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                                   <h4 class="notification-title">{{ __('Notifications') }} (2)</h4>
                                   <div class="d-flex align-items-center">
                                       <a href="#"
                                           class="text-primary fs-15 me-3 lh-1">{{ __('Mark all as read') }}</a>
                                       <div class="dropdown">
                                           <a href="javascript:void(0);" class="bg-white dropdown-toggle"
                                               data-bs-toggle="dropdown"><i
                                                   class="ti ti-calendar-due me-1"></i>{{ __('Today') }}
                                           </a>
                                           <ul class="dropdown-menu mt-2 p-3">
                                               <li>
                                                   <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                       {{ __('This Week') }}
                                                   </a>
                                               </li>
                                               <li>
                                                   <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                       {{ __('Last Week') }}
                                                   </a>
                                               </li>
                                               <li>
                                                   <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                                       {{ __('Last Week') }}
                                                   </a>
                                               </li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>

                               <div class="noti-content">
                                   <div class="d-flex flex-column">
                                       <div class="border-bottom mb-3 pb-3">
                                           <a href="activities.html.htm">
                                               <div class="d-flex">
                                                   <span class="avatar avatar-lg me-2 flex-shrink-0">
                                                       <img src="{{ asset('assets/img/profiles/avatar-27.jpg') }}"
                                                           alt="Profile">
                                                   </span>
                                                   <div class="flex-grow-1">
                                                       <p class="mb-1"><span
                                                               class="text-dark fw-semibold">Shawn</span>
                                                           performance in Math is
                                                           below the threshold.</p>
                                                       <span>Just Now</span>
                                                   </div>
                                               </div>
                                           </a>
                                       </div>
                                   </div>
                               </div>
                               <div class="d-flex p-0">
                                   <a href="#" class="btn btn-light w-100 me-2">{{ __('Cancel') }}</a>
                                   <a href="activities.html.htm"
                                       class="btn btn-primary w-100">{{ __('View All') }}</a>
                               </div>
                           </div>
                       </div>
                       <div class="pe-1">
                           <a href="#" class="btn btn-outline-light bg-white btn-icon position-relative me-1">
                               <i class="ti ti-brand-hipchat"></i>
                               <span class="chat-status-dot"></span>
                           </a>
                       </div>

                       <div class="pe-1">
                           <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" id="btnFullscreen">
                               <i class="ti ti-maximize"></i>
                           </a>
                       </div>
                       <div class="dropdown ms-1">
                           <a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center"
                               data-bs-toggle="dropdown">
                               <span class="avatar avatar-md rounded">
                                   <img src="{{ asset('assets/img/profiles/avatar-27.jpg') }}" alt="Img"
                                       class="img-fluid">
                               </span>
                           </a>
                           <div class="dropdown-menu">
                               <div class="d-block">
                                   <div class="d-flex align-items-center p-2">
                                       <span class="avatar avatar-md me-2 online avatar-rounded">
                                           <img src="{{ asset('assets/img/profiles/avatar-27.jpg') }}"
                                               alt="img">
                                       </span>
                                       <div>
                                           <h6 class="">{{ Auth::user()->full_name ?? '' }}</h6>
                                           <p class="text-primary mb-0">{{ Auth::user()->email ?? '' }}</p>
                                       </div>
                                   </div>
                                   <hr class="m-0">
                                   <a class="dropdown-item d-inline-flex align-items-center p-2"
                                       href="profile.html.htm">
                                       <i class="ti ti-user-circle me-2"></i>{{ __('My Profile') }}</a>
                                   <a class="dropdown-item d-inline-flex align-items-center p-2"
                                       href="profile-settings.html.htm"><i
                                           class="ti ti-settings me-2"></i>{{ __('Settings') }}</a>
                                   <hr class="m-0">
                                   <a class="dropdown-item d-inline-flex align-items-center p-2"
                                       href="{{ route('logout') }}"><i
                                           class="ti ti-login me-2"></i>{{ __('Logout') }}</a>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
       <!-- /Header -->
