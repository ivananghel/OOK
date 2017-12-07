<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrimInput {

    public function handle(Request $request, Closure $next){

        $handler = function($params) use(&$handler){

            foreach ($params as $name => $value){

                if(is_array($value)){
                    $params[$name] = $handler($value);
                }

                else if(is_string($value)){
                    $params[$name] = trim($value);
                }

                else {
                    continue;
                }

            }

            return $params;

        };

        $request->replace($handler($request->all()));

        return $next($request);

    }

}