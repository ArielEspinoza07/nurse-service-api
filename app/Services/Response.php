<?php

namespace App\Services;

/**
 * Class Response
 * @package App\Utils
 */
class Response
{
    /**
     * @param string $message
     * @param null   $data
     *
     * @return array
     */
    public static function success(string $message, $data = null): array
    {
        return self::data(true, $message, $data);
    }


    /**
     * @param string $message
     * @param        $data
     *
     * @return array
     */
    public static function error(string $message, $data = null): array
    {
        return self::data(false, $message, $data);
    }


    /**
     * @param bool   $success
     * @param string $message
     * @param null   $data
     *
     * @return array
     */
    protected static function data(bool $success, string $message, $data = null): array
    {
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        if ( ! empty($data)) {
            $response['data'] = $data;
        }

        return $response;
    }
}
