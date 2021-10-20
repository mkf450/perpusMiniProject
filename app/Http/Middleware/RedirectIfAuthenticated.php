<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }

            /** @var User $user */
            $user = Auth::guard($guard);

            // to admin dashboard
            if($user->hasRole('petugas')) {
              return redirect(route('petugas_dashboard'));
            }

            // to user dashboard
            else if($user->hasRole('anggota')) {
              return redirect(route('anggota_dashboard'));
            }
        }

        return $next($request);
    }
}
