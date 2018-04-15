<?php

namespace App\Exceptions\Api;

use Illuminate\Http\Response;
use App\Foundations\ApiException;

class MaintenanceException extends ApiException
{
    const STATUS = Response::HTTP_SERVICE_UNAVAILABLE;
    const MESSAGE = 'Unfortunately the service is down for a bit of maintenance right now.';
}
