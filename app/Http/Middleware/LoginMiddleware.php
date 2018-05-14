<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // phải có lớp này mới có thể sử dụng để đăng nhập

class LoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->quyen=1 || $user->quyen=0 || $user->quyen==2){
                return $next($request);
            }else{
                return redirect('login');
            }

        }else{
            return redirect('login');
        }

    }
}
