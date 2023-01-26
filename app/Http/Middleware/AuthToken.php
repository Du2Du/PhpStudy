<?php

namespace App\Http\Middleware;

use App\Exceptions\ForbiddenException;
use App\Services\TokenService;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class AuthToken
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
        $token = TokenService::formatTokenFromHeader($request);
        if ($token) {
            try {
                TokenService::decodeToken($token);
                return $next($request);
            } catch (Exception $ex) {
                throw new ForbiddenException("Usuário não autenticado!");
            }
        }
        throw new ForbiddenException("Usuário não autenticado!");
    }
}
