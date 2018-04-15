<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

trait ApiTrait
{
    protected function isApiCall(Request $request): bool
    {
        return $request->is('api/*');
    }

    protected function getEnvironments(Request $request): array
    {
        return [
            'datetime' => Carbon::now('UTC'),
            'method' => $request->getMethod(),
            'path' => $request->getSchemeAndHttpHost().$request->getRequestUri(),
            'runtime' => microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],
        ];
    }

    protected function json($data, $status = Response::HTTP_OK, array $error = [], array $meta = [], array $headers = [], $options = 0): JsonResponse
    {
        $request = app('request');

        $data = get_array($data);

        $error = get_array($error);
        if (count($error) == 0) {
            $error = false;
        }

        $meta = get_array($meta);
        $meta['environment'] = $this->getEnvironments($request);

        return response()->json(compact('data', 'error', 'meta'), $status, $headers, $options);
    }
}
