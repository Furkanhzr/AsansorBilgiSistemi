<?php

namespace App\Http\Middleware;

use App\Models\HasRoles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
            if (!is_null(HasRoles::where('model_id',Auth::id())->first())){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('customer.dashboard');
            }
        }
        return $next($request);
    }
}
