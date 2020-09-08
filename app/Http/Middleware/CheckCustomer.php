<?php

namespace App\Http\Middleware;
Use Illuminate\Support\Facades\Auth;
use Closure;

class CheckCustomer
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->level == 2 )
                return $next($request);
            else
                return redirect(''.Route('p.logout').'')->with('thongbao','Tài khoản và mật khẩu không chính xác');

        }
        else
                return redirect(''.Route('p.logout').'')->with('thongbao','Tài khoản và mật khẩu không chính xác');
        // return $next($request);
    }
}
