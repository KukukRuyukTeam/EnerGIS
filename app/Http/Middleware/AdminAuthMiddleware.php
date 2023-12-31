<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        $authenticate = true;

        if (!$token) {
            $authenticate = false;
        }

        $admin = Admin::where('token', $token)->first();
        if (!$admin) {
            $authenticate = false;
        } else {
            Auth::login($admin);
        }


        if ($authenticate) {
            return $next($request);
        } else {
            return response()->json([
                "errors" => [
                    "messages" => [
                        "unauthorized"
                    ]
                ]
            ])->setStatusCode(401);
        }
    }
}
