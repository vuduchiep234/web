<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:29 PM
 */

namespace App\Handlers;


use App\Handlers\HandlerResponse\HandlerResponse;

interface Handler
{
    public function setNextHandler(Handler $nextHandler): void;

    public function handle(array &$attributes): HandlerResponse;
}