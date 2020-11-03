<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
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
        $agent = app(Agent::class);
        $agent->setHttpHeaders($request->headers);
        $browser = $agent->browser();
        $version = $agent->version($browser);

        Log::debug($agent->getUserAgent());

        if (($browser == 'IE') && ($version < 11)) {
            return redirect('https://browsehappy.com');
        }
        return $next($request);
    }
}
