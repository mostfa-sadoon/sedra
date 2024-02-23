<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App;
use Validator;

class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validator =Validator::make($request->header(), [
            'lang'=>'required',
        ]);
        if ($validator->fails()) {
        return response()->json([
            'message'=>$validator->messages()->first()
        ],403);
        }
        $lang=$request->header('lang');

        App::setLocale($lang);
        return $next($request);
    }
}
