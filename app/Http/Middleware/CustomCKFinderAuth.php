<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomCKFinderAuth
{
    public function handle($request, Closure $next)
{
    config(['ckfinder.authentication' => function() {
        return true;
    }]);
    return $next($request);
}
}
