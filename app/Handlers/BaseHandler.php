<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:35 PM
 */

namespace App\Handlers;


use App\Handlers\HandlerResponse\CreateHandlerResponse;
use App\Handlers\HandlerResponse\HandlerResponse;

class BaseHandler implements Handler
{
    use CreateHandlerResponse;
    /**
     * @var Handler $nextHandler
     */
    private $nextHandler;
    private static $MESSAGE = 'Success';

    public function setNextHandler(Handler $nextHandler): void
    {
        $this->nextHandler = $nextHandler;
    }

    public function handle(array &$attributes): HandlerResponse
    {
        if ($this->nextHandler != null) {
            return $this->nextHandler->handle($attributes);
        } else {
            return $this->createHandlerResponse(self::$MESSAGE, true);
        }
    }

    public function getNextHandler(): ?Handler
    {
        return $this->nextHandler;
    }
}