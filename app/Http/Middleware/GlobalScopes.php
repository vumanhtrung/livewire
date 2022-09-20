<?php

namespace App\Http\Middleware;

use App\Models\Country;
use App\Models\District;
use App\Models\Hotel;
use App\Models\Province;
use App\Models\Ward;
use App\Scopes\ActiveScope;
use Closure;
use Illuminate\Http\Request;

class GlobalScopes
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
        Country::addGlobalScope(new ActiveScope());
        District::addGlobalScope(new ActiveScope());
        Hotel::addGlobalScope(new ActiveScope());
        Province::addGlobalScope(new ActiveScope());
        Ward::addGlobalScope(new ActiveScope());

        return $next($request);
    }
}
