<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\RequestLog;
use Illuminate\Http\Request;
use App\Events\AnalyticsUpdated;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Route;

class RequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    
        $response = $next($request);

        $route = Route::getRoutes()->match($request);
        $currentRouteName = $route->getName();
        if($currentRouteName == 'analytics.dashboard'){
            return $response;
        }
        else{
            // Store Analytics
            $requestTime = Carbon::createFromTimestamp($_SERVER['REQUEST_TIME']);
            $requestLog = RequestLog::create([
                'ip_address' => $request->ip(),
                'device' => Agent::device(),
                'platform' => Agent::platform(),
                'platform_version' => Agent::version(Agent::platform()),
                'browser' => Agent::browser(),
                'browser_version' => Agent::version(Agent::browser()),
                'is_mobile' => Agent::isPhone() ? 1 : 0,
                'url' => $request->getPathInfo(),
                'method' => $request->method(),
                'response_time' => time() - $requestTime->timestamp,
                'request_time' => $requestTime,
            ]);

            broadcast(new AnalyticsUpdated($requestLog));
        }

        return $response;
    }
}
