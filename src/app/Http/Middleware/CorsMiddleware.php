<?php namespace App\Http\Middleware;

class CorsMiddleware {

  public function handle($request, \Closure $next)
  {
    $response = $next($request);

    $response->header('Access-Control-Allow-Methods', '*');
    $response->header('Access-Control-Allow-Headers', '*');
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Request-Method', 'POST');
    $response->header('Access-Control-Allow-Credentials', 'true');
    $response->header('Access-Control-Max-Age', '86400');
    
    return $response;
  }

}