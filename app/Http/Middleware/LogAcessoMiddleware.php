<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
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
        // return $next($request);
        // dd($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(['log' => "IP $ip acessou a rota $rota"]);
        return Response('Chegamos no middlware! Finalizamos no middleware.');
    }
}