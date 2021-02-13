<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function get(Request $request) {
        $id = $request->user()->id;
        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user == null) abort(404);

        $fields = ['first_name', 'second_name', 'third_name', 'profile_photo_path', 'email', 'id', 'phone_number', 'role_id'];
        $user = DB::table('users')->where('id', '=', $id)->first($fields);
        
        $role = DB::table('user_role')->where('id', '=', $user->role_id)->first(['role']);
        $role = $role ? $role->role : "user";
        $user->role = $role;
        unset($user->role_id);

        return Inertia::render('Dashboard', [
            'user' => $user
        ]);
    }
}
