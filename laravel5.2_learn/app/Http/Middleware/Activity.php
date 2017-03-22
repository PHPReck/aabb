<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/20
 * Time: 11:08
 */
namespace App\Http\Middleware;

use Closure;

class Activity
{
    //前置操作
//    public function handle($request, Closure $next)
//    {
//        if(time() < strtotime('2017-2-21')) {
//            return redirect('activity0');
//        }
//        return $next($request);
//    }

    //后置操作
    public function handle($request , Closure $next)
    {
        $req = $next($request);
        echo $req;

        echo '后置';
    }

}