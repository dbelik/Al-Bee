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
        $fields = ['first_name', 'second_name', 'third_name', 'profile_photo_path', 'email', 'id', 'phone_number', 'ban'];
        $user = DB::table('users')->where('id', '=', $id)->first($fields);
        return Inertia::render('Users/Display', [
            'user' => $user
        ]);
    }
    
    public function update(Request $request) {
        $id = $request->route('id');
        $unban = Carbon::parse($request->ban_duration);
        $user = DB::table('users')->where('id', '=', $id)->update(['ban' => $unban]);
        return redirect()->back();
    }
}
