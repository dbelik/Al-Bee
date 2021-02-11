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
        if ($this->isAdmin($request)) return redirect()->back()->withErrors(['error' => "You can't update admin!"]);

        if ($request->ban_duration) return $this->updateBan($request);
        else if ($request->role) return $this->updateRole($request);
    }

    private function isAdmin(Request $request) {
        $id = $request->route('id');

        $user_role_id = DB::table('users')->where('id', '=', $id)->first(['role_id'])->role_id;
        $admin_role_id = DB::table('user_role')->where('role', '=', "admin")->first(['id'])->id;

        return $user_role_id == $admin_role_id;
    }

    private function updateBan(Request $request) {
        $id = $request->route('id');
        $unban = null;
        try {
            $unban = Carbon::parse($request->ban_duration);   
        } catch (\Exception $error) {
            return redirect()->back()->withErrors(['ban_duration' => "Can't read date!"]);
        }
        $user = DB::table('users')->where('id', '=', $id)->update(['ban' => $unban]);
        return redirect()->back();
    }
    
    private function updateRole(Request $request) {
        $id = $request->route('id');
        $role_id = DB::table('user_role')->where('role', '=', $request->role)->first(['id']);
        if ($role_id == null)
            return redirect()->back()->withErrors(['role' => "Wrong role!"]);
        
        $role_id = $role_id->id;
        $user = DB::table('users')->where('id', '=', $id)->update(['role_id' => $role_id]);
        return redirect()->back();
    }
}
