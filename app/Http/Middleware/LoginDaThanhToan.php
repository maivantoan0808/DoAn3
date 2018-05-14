<?php

namespace App\Http\Middleware;

use Closure;
use App\Baihoc;
use App\CauHoi;
use App\De;
use App\Khoahoc;
use App\Monhoc;
use App\Quiz_test;
use App\TraLoi;
use App\User;
use App\donggop;
use App\thecao;
use App\Buy;
class LoginDaThanhToan
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
        $buy = Buy::all();
        $monhoc = Monhoc::all();
        foreach ($buy as $b) {
            foreach ($monhoc as $mh) {
                if(($b->monhoc_id == $mh->id)&& ($b->users_id == $user->id)){
                    return $next($request);
                }
            }
        }
        return redirect('trangchu');
    }else{
        return redirect('trangchu');
    }
}

