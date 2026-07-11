<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminLoginAuth
{
    public function handle(Request $request, Closure $next)
    {        
        if (!session()->has('id_admin')) {
            return redirect()->route('login')
                ->with('error', 'Anda harus login terlebih dahulu!');
        }

        return $next($request);    
    }
}
