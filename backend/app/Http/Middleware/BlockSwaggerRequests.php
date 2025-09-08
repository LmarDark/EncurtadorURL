<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockSwaggerRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		$referer = $request->header('referer', '');
    
    	if (str_contains($referer, '/swagger')) {
        	return response()->json([
            	'message' => 'Rota desabilitada.'
        	], 403);
    	}
    
    	return $next($request);
	}
}
