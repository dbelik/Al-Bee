<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;

class AuthorizeAdmin
{
    /**
     * Prevent users without admin role from access.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin_role_id = DB::table('user_role')->where('role', 'Admin')->first()->id;
        if (\Auth::user()->role_id == $admin_role_id) {
            return $next($request);
          }
      
        return redirect('dashboard');
    }
}
