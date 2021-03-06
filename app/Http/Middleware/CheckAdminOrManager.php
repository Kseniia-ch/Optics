<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminOrManager
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
        $user = $request->user();

        if (!isset($user)) {
            return redirect('login');
        }

        if (!$user->isAdmin() && !$user->isManager()) {
            return redirect('/');
        }

        return $next($request);
    }
}
