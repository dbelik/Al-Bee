<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function get(Request $request) {
        return Inertia::render('Dashboard', [
            'user' => $request->user()
        ]);
    }
}
