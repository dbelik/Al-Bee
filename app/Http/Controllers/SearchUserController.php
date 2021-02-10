<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Inertia\Inertia;

class SearchUserController extends Controller
{
    public function __invoke(Request $request) {
        $fields = ['first_name', 'second_name', 'profile_photo_path', 'id'];
        $search = $request->query('search');

        $users = DB::table('users');

        if ($search)
            $users = $users
                ->where('first_name', 'like', "%$search%")
                ->orWhere('second_name', 'like', "%$search%")
                ->orWhere('third_name', 'like', "%$search%");
        
        $users = $users->limit(10)->get($fields);
        return Inertia::render('SearchUsers', [
            'users' => $users
        ]);
    }
}
