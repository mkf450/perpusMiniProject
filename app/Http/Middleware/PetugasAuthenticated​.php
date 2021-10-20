<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PetugasAuthenticated​
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        // if user is not admin take him to his dashboard
        // if ( Auth::user()->isAnggota() ) {
        if ( Auth::user()->hasRole('anggota') ) {
          return redirect(route('anggota_dashboard'));
        }

        // allow admin to proceed with request
        // else if ( Auth::user()->isPetugas() ) {
        else if ( Auth::user()->hasRole('petugas') ) {
          return $next($request);
          // return redirect(route('petugas_dashboard'));
        }
    }
}
