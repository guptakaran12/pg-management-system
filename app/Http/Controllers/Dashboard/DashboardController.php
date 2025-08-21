<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
          if(Gate::allows('viewAdminDashboard')){
            $stats = User::selectRaw("
                COUNT(*) as total,
                SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active_count,
                SUM(CASE WHEN status = 'inactive' THEN 1 ELSE 0 END) as inactive_count
            ")
            ->where('role', '!=', 'Admin')
            ->first();

            $activePercent = $stats->total > 0 
            ? round(($stats->active_count / $stats->total) * 100, 1) 
            : 0;

            return view('dashboard.index', [
                'totalUsers'   => $stats->total,
                'activeUsers'  => $stats->active_count,
                'inactiveUsers'=> $stats->inactive_count,
                'activePercent' => $activePercent,
            ]);
          }

          if(Gate::allows('viewUserDashboard')){
              return view('dashboard.user.dashboard');
          }
          
          abort(403, 'Unauthorized action.');
    }
}
