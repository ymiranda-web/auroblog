<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class AgentBrowser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $agent = new Agent();
        $agent->setHttpHeaders($request->headers);
        $browser = $agent->browser();
        $version = $agent->version($browser);
        if ($version < 11) {
            return redirect('https://browsehappy.com');
        }
        return $next($request);
    }
}
