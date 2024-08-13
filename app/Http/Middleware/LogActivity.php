<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response =  $next($request);

        if (Auth::check()) {

            $user = Auth::user();
            $action = $request->route()->getName();
            $description = "L'utilisateur {$user->nom} à effectué l'action de {$action}";

            Log::create([
                'action' => $action,
                'description' => $description,
                'user_id' => $user->id,
                'logged_at' => Carbon::now(),
            ]);

        }

        return $response;


    }
}
