<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CobacobaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil parameter 'data' dari route
        $data = $request->route('data');

        // Logika validasi: Pastikan 'data' sesuai dengan kriteria
        if ($data !== 'nigga') { // Ganti 'allowedValue' dengan nilai yang Anda inginkan
            dd($data);
        }

        // Jika validasi lolos, teruskan ke request berikutnya
        return $next($request);
    }
}
