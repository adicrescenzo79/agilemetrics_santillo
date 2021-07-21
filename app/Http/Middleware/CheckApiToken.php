<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
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
        // return $next($request);
      $token = $request->api_key;
      $user = User::where('api_token', $token)->first();
      // dd($user);

      if(!$user){
        return response()->json([
          'message' => 'no api key',
          'success' => false
        ]);
      }

      return $next($request);
    }
}
