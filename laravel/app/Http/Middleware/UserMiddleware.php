<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::check()) {
        if (Auth::user()->permission == "ผู้ใช้งานระบบ" || Auth::user()->permission == "สมาชิกหน่วยงาน") {
          return $next($request);
        }
      } else {
        abort(503);
      }
    }
}
