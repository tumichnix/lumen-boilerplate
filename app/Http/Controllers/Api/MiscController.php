<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\NotFoundException;
use App\Foundations\ApiController;
use Illuminate\Http\JsonResponse;

class MiscController extends ApiController
{
    public function getPing(): JsonResponse
    {
        throw new NotFoundException();
        return $this->json([
            'ping' => 'pong',
        ]);
    }
}
