<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('masyarakat')->check() && (Auth::guard('masyarakat')->user()->ban == '1')) {
            Auth::guard('masyarakat')->logout();

            // $request->session()->invalidate();

            // $request->session()->regenerateToken();

            // example:
            alert()->error('Banned', 'Akun Anda Saat Ini Sedang Di Tangguhkan! Silakan Hubungi Admin!')->footer('<a href=" https://wa.me/6281382340144">Apakah anda ingin menghubungi admin?</a>')->showConfirmButton('Oke', '	#FF8C00');


            return redirect()->to('user');
        }


        return $next($request);
    }
}
