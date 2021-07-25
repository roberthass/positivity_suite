<?php namespace App\Http\Middleware;

class CorsMiddleware {

  public function handle($request, \Closure $next)
  {
    $response = $next($request);

    $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS');
    // $response->header('Access-Control-Allow-Headers', '*');
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Request-Method', 'POST');
    $response->header('Access-Control-Allow-Credentials', 'true');
    $response->header('Access-Control-Max-Age', '86400');
    $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

    return $response;
  }

}