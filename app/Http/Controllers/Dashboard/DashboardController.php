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
              $userCount = "0";
              $userCount = User::where('role', '!=', 'Admin')->count();
              return view('dashboard.index',compact('userCount'));
          }

          if(Gate::allows('viewUserDashboard')){
              return view('dashboard.user.dashboard');
          }
          
          abort(403, 'Unauthorized action.');
    }
}
