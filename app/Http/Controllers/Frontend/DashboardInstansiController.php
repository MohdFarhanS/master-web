<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DashboardInstansi;

class DashboardInstansiController extends Controller
{
    public function index()
    {
        $dashboardInstansis = DashboardInstansi::with('file')->get();
        return view('frontend.dashboard-instansi.index', compact('dashboardInstansis'));
    }

    public function show($id)
    {
        $dashboardInstansi = DashboardInstansi::with('file')->findOrFail($id);
        return view('frontend.dashboard-instansi.show', compact('dashboardInstansi'));
    }
}
