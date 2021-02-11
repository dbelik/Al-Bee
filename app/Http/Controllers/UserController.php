<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Inertia\Inertia;

class UserController extends Controller
{
    public function get(Request $request) {
        $id = $request->route('id');

        $fields = ['first_name', 'second_name', 'third_name', 'profile_photo_path', 'email', 'id', 'phone_number', 'ban', 'role_id'];
        $user = DB::table('users')->where('id', '=', $id)->first($fields);
        
        $role = DB::table('user_role')->where('id', '=', $user->role_id)->first(['role'])->role;
        $user->role = $role;
        unset($user->role_id);

        return Inertia::render('Users/Display', [
            'user' => $user
        ]);
    }
    
    public function update(Request $request) {
        $id = $request->route('id');

        $user_role_id = DB::table('users')->where('id', '=', $id)->first(['role_id'])->role_id;
        $admin_role_id = DB::table('user_role')->where('role', '=', "Admin")->first(['id'])->id;

        if ($user_role_id == $admin_role_id) {
            return redirect()->back()->withErrors(['ban_duration' => "You can't ban admin!"]);
        }

        $unban = null;
        try {
            $unban = Carbon::parse($request->ban_duration);   
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['ban_duration' => "Can't read date!"]);
        }
        $user = DB::table('users')->where('id', '=', $id)->update(['ban' => $unban]);
        return redirect()->back();
    }
}
