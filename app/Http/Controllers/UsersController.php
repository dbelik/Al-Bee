<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Inertia\Inertia;

class UsersController extends Controller
{
    public function get(Request $request) {
        $entriesPerPage = 10;
        $page = $request->query('page') - 1;
        $page = $page < 0 ? 0 : $page;
        $skip = 0;
        if ($page && $page > 0) $skip = $page * $entriesPerPage;
        
        $search = $request->query('search');
        $searchQuery = $search;
        $search = explode(" ", $search);

        $users = DB::table('users');

        if ($search)
            foreach($search as $name) {
                $users = $users
                    ->where('first_name', 'like', "%$name%")
                    ->orWhere('second_name', 'like', "%$name%")
                    ->orWhere('third_name', 'like', "%$name%");
            }
        
        $total = $users->count();
        $fields = ['first_name', 'second_name', 'profile_photo_path', 'id'];
        $users = $users->skip($skip)->limit($entriesPerPage)->get($fields);
        return Inertia::render('Users/Search', [
            'users' => $users,
            'total' => $total,
            'perPage' => $entriesPerPage,
            'page' => $page,
            'searchQuery' => $searchQuery
        ]);
    }
}
