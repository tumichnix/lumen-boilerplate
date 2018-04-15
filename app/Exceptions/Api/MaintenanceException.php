<?php

namespace App\Exceptions\Api;

use App\Foundations\ApiException;
use Illuminate\Http\Response;

class MaintenanceException extends ApiException
{
    const STATUS = Response::HTTP_SERVICE_UNAVAILABLE;
    const MESSAGE = 'Unfortunately the service is down for a bit of maintenance right now.';
}
