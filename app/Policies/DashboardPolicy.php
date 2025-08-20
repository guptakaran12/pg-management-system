<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function viewAdminDashboard(User $user)
    {
        return $user->role == 'Admin';
    }

    public function viewUserDashboard(User $user)
    {
        return in_array($user->role, ['Resident', 'Staff']);
    }
}
