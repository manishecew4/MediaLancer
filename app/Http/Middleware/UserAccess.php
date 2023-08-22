<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // dd([
        //     "auth" => auth()->user()->type,
        //     "user" => Auth::user()->type,
        //      "auth" => gettype(Auth::user()->is_approve),
        //      "user" => Auth::user()->type,
        // ]);

        if (auth()->user()->type == $userType) {
            if (Auth::user()->type == 'vendor' && Auth::user()->is_approve == 'false') {
                return response()->json(['You do not have permission to access for this page wait for admin approval.']);
            }
            return $next($request);
        }
        // return redirect()->route(auth()->user()->type);

        return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */
    }
}
