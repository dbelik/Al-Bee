<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Inertia\Inertia;

class GetUserProfileController extends Controller
{
    public function __invoke(Request $request) {
        $id = $request->route('id');
        $fields = ['first_name', 'second_name', 'third_name', 'profile_photo_path', 'email', 'id', 'phone_number'];
        $user = DB::table('users')->where('id', '=', $id)->first($fields);
        return Inertia::render('Users/Display', [
            'user' => $user
        ]);
    }
}
