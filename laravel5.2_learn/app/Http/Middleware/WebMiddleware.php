<?php
/**
 * Created by PhpStorm.
 * User: Reck
 * Date: 2017/2/16
 * Time: 18:13
 */

namespace App\Http\Middleware;

use Closure;

class WebMiddleware
{
    public function handle($request,Closure $next)
    {
        echo "中间件";
        return $next($request);
    }
}
