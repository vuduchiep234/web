<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:33 PM
 */

namespace App\Handlers\HandlerResponse;


class HandlerResponse
{
    private $message;
    private $status;

    private static $response;

    public function __construct()
    {
        $this->message = 'Empty';
        $this->status = false;
    }

    public static function getInstance() :HandlerResponse
    {
        if (self::$response == null) {
            self::$response = new HandlerResponse();
        }

        return self::$response;
    }

    public function getResponseMessage() :string
    {
        return $this->message;
    }

    public function getResponseStatus() : bool
    {
        return $this->status;
    }

    public function setResponseMessage(string $content)
    {
        $this->message = $content;
    }

    public function setResponseStatus(bool $status)
    {
        $this->status = $status;
    }
}