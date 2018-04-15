<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests;

class RateLimit extends ThrottleRequests
{
    protected function resolveRequestSignature($request)
    {
        return sha1(implode('|', [
                $request->method(),
                $request->root(),
                $request->path(),
                $request->ip(),
                $request->query('access_token'),
            ]
        ));
    }
}
