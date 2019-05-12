<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:09 PM
 */

namespace App\Handlers\UserHandler;


use App\Handlers\BaseHandler;
use App\Handlers\HandlerResponse\HandlerResponse;

class HashPasswordHandler extends BaseHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $password = $attributes['password'];
        $hashPassword = hash('md5', $password);
        $attributes['password'] = $hashPassword;

        return parent::handle($attributes);
    }
}