<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Permission
{
    protected $permission;

    public function __construct(\App\Helpers\Permission\Permission $permission) {
        $this->permission = $permission;
    }

    public function handle(Request $request, Closure $next, $permission, $guard = null){
        dd($request);
        if(app('auth')->user()->can($permission)) {
            return $next($request);
        } else {
            return abort('403','Yetkisiz Kullanıcı');
        }
    }
}
