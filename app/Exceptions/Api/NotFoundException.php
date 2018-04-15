<?php

namespace App\Exceptions\Api;

use App\Foundations\ApiException;
use Illuminate\Http\Response;

class NotFoundException extends ApiException
{
    const STATUS = Response::HTTP_NOT_FOUND;
    const MESSAGE = 'There is no resource behind this URI';
}
