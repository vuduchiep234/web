<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:42 PM
 */

namespace App\Handlers;


use App\Services\Service;

abstract class BaseEloquentHandler extends BaseHandler
{
    abstract public function createHandlerService():Service;
}