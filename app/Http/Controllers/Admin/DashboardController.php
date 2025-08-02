<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorRole;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $sumQuota = DoctorRole::getSumQuota();

        return view('admin.dashboard', compact('sumQuota'));
    }
}
