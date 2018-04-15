<?php

namespace App\Exceptions\Api;

use Illuminate\Http\Response;
use App\Foundations\ApiException;

class NotFoundException extends ApiException
{
    const STATUS = Response::HTTP_NOT_FOUND;
    const MESSAGE = 'There is no resource behind this URI';
}
