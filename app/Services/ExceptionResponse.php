<?php

namespace App\Services;

use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class ExceptionResponse
 * @property string    name
 * @property Exception exception
 * @property array     exceptions
 *
 * @package App\Utils
 */
class ExceptionResponse
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var Exception
     */
    private $exception;

    /**
     * @var array
     */
    private $exceptions = [
        'AccessDenied'     => [
            'code'    => 403,
            'message' => null,
        ],
        'Authentication'   => [
            'code'    => 403,
            'message' => null,
        ],
        'BadMethodCall'    => [
            'code'    => 404,
            'message' => 'Not Found',
        ],
        'MethodNotAllowed' => [
            'code'    => 404,
            'message' => 'Not Found',
        ],
        'ModelNotFound'    => [
            'code'    => 404,
            'message' => 'Not Found',
        ],
        'Query'            => [
            'code'    => 500,
            'message' => 'Internal Server Error',
        ],
        'Validation'       => [
            'code'    => 422,
            'message' => 'Unprocessable Entity',
        ],
        'Validator'        => [
            'code'    => 422,
            'message' => 'Unprocessable Entity',
        ],
        'NotFound'         => [
            'code'    => 404,
            'message' => 'Not Found',
        ],
    ];


    /**
     * ExceptionResponse constructor.
     *
     * @param Exception $exception
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
        $this->name      = $this->getExceptionName();
    }


    /**
     * @return JsonResponse
     */
    public function handle(): JsonResponse
    {
        if ( ! empty($this->exceptions[ $this->name ])) {

            return response()->json(Response::error($this->getExceptionMessage(), $this->getExceptionData()), $this->getExceptionCode());
        }

        return response()->json(Response::error('Internal Server Error', [
            'error' => $this->exception->getMessage(),
        ]), (in_array($this->exception->getCode(), [0, 500]) ? 500 : $this->exception->getCode()));
    }


    /**
     *
     * @return string
     */
    private function getExceptionName(): string
    {
        return strtr(class_basename($this->exception), ['Http' => '', 'Exception' => '']);
    }


    /**
     * @return mixed|string
     */
    private function getExceptionCode(): ?string
    {
        $code = method_exists($this->exception, 'getStatusCode') ? $this->exception->getStatusCode() : null;
        $code = ! empty($code) ? $code : (property_exists($this->exception, 'status') ? $this->exception->status : null);

        return empty($code) ? $this->exceptions[ $this->name ]['code'] : $code;
    }


    /**
     * @return mixed|string
     */
    private function getExceptionMessage(): ?string
    {
        $message = $this->exception->getMessage();
        $message = empty($message) || ! is_null($this->exceptions[ $this->name ]['message']) ? $this->exceptions[ $this->name ]['message'] : $message;
        if (strpos($message, 'Model') !== false) {
            $message = $this->exceptions[ $this->name ]['message'];
        }

        return empty($message) ? $this->exception->statustext() : $message;
    }


    /**
     * @return null|array
     */
    private function getExceptionData(): ?array
    {
        $data = method_exists($this->exception, 'getMessageBag') ? $this->exception->getMessageBag()
                                                                                   ->getMessages() : null;
        $data = empty($data) && property_exists($this->exception, 'validator') ? $this->exception->validator->errors()
                                                                                                            ->getMessages() : $data;

        return $data;
    }
}
