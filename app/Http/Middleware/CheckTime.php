<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckTime
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
        $now = Carbon::now('Asia/Tehran');
        $start = Carbon::createFromTimeString('14:00', 'Asia/Tehran');
        $end = Carbon::createFromTimeString('19:15', 'Asia/Tehran');
        if ($now->between($start, $end)) {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
