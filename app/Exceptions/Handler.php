<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Services\ExceptionResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [//
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }


    /**
     * @param           $request
     * @param Exception $exception
     *
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function handleException($request, Exception $exception)
    {
        if ( ! $exception instanceof Exception) {
            return parent::render($request, $exception);
        }

        return (new ExceptionResponse($exception))->handle();
    }
}
