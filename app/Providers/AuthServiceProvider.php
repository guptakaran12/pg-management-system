<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\DashboardPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
       
    ];

    public function boot(): void
    {
          // Admin dashboard gate
          Gate::define('viewAdminDashboard', [DashboardPolicy::class, 'viewAdminDashboard']);

          // User dashboard gate
          Gate::define('viewUserDashboard', [DashboardPolicy::class, 'viewUserDashboard']);
    }
}
