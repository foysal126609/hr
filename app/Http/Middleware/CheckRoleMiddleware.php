<?php

namespace App\Http\Middleware;

use App\Models\RoleRoute;
use Closure;
use Illuminate\Http\Request;

class CheckRoleMiddleware
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
        if($request->user() === null)
        {
            return redirect('/')->with('message', 'Please log in first. Thanks');
        }
        $actions    = $request->route()->getAction();
        $routeName  = isset($actions['as']) ? $actions['as'] : null;
        $routesData = RoleRoute::where('route_name', $routeName)->get();
        $roles      = [];
        foreach ($routesData as $routeData) {
            array_push($roles, $routeData->role_name);
        }
        if($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        return redirect('/dashboard')->with('message', 'Insufficient Permission');
    }
}
