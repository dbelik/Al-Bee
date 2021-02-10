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
        $search = explode(" ", $search);

        $users = DB::table('users');

        if ($search)
            foreach($search as $name) {
                $users = $users
                    ->where('first_name', 'like', "%$name%")
                    ->orWhere('second_name', 'like', "%$name%")
                    ->orWhere('third_name', 'like', "%$name%");
            }
        
        $users = $users->limit(10)->get($fields);
        return Inertia::render('SearchUsers', [
            'users' => $users
        ]);
    }
}
