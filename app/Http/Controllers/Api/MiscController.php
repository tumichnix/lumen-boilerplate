<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Foundations\ApiController;

class MiscController extends ApiController
{
    public function getPing(): JsonResponse
    {
        return $this->json([
            'ping' => 'pong',
        ]);
    }
}
