<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function managerDashboard()
    {
        echo '<pre>';print_r(Auth::User());die;
    }
}