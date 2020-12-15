<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckNhaTuyenDung
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
        $getPhanQuyen = Session::get('loai_tai_khoan');
        if ($getPhanQuyen != 2){
            return redirect('/');
        }
        return $next($request);
    }
}
