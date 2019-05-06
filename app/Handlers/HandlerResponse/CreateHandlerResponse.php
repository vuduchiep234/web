<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:34 PM
 */

namespace App\Handlers\HandlerResponse;


trait CreateHandlerResponse
{
    /**
     * @param string $content :if error occurs in handle activities, set the error message
     * @param bool $status :if error occurs in handle activities, set it false
     * @return HandlerResponse
     */
    public function createHandlerResponse(string $content, bool $status) :HandlerResponse
    {
        $handlerResponse = HandlerResponse::getInstance();
        $handlerResponse->setResponseMessage($content);
        $handlerResponse->setResponseStatus($status);

        return $handlerResponse;
    }
}