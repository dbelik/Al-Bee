<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Inertia\Inertia;

class SearchUserController extends Controller
{
    public function __invoke(Request $request) {
        $fields = ['first_name', 'second_name', 'profile_photo_path', 'id'];
        $users = DB::table('users')->limit(10)->get($fields);
        return Inertia::render('SearchUsers', [
            'users' => $users
        ]);
    }
}
