<?php


namespace DeckBuilder\Service\Error;


class ErrorService
{
    /**
     * @param $statusCode
     */
    public function setError($statusCode)
    {
        $statusText = [
            404 => 'ERROR',
            500 => 'NOT FOUND',
        ];
        header($_SERVER["SERVER_PROTOCOL"] . $statusText[$statusCode]);
    }
}