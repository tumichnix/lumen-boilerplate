<?php

namespace App\Exceptions;

use App\Exceptions\Api\NotFoundException;
use App\Traits\ApiTrait;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tumichnix\Maintenance\Exceptions\MaintenanceException;

class Handler extends ExceptionHandler
{
    use ApiTrait;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    protected $mapExceptionsToApiExceptions = [
        MaintenanceException::class => \App\Exceptions\Api\MaintenanceException::class,
        ModelNotFoundException::class => NotFoundException::class,
        NotFoundHttpException::class => NotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof \App\Foundations\ApiException) {
            return $e->response();
        }
        if (array_key_exists(get_class($e), $this->mapExceptionsToApiExceptions)) {
            return (new $this->mapExceptionsToApiExceptions[get_class($e)])->response();
        }

        return parent::render($request, $e);
    }
}
