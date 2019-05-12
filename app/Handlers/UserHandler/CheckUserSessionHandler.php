<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:28 PM
 */

namespace App\Handlers\UserHandler;


use App\Handlers\HandlerResponse\HandlerResponse;

class CheckUserSessionHandler extends EloquentUserHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('user_id', $attributes )) {
            return $this->createHandlerResponse('Missing user id', false);
        }
        if ($attributes['user_id'] != session('user_id')) {
            return $this->createHandlerResponse('Invalid user id', false);
        }
        return parent::handle($attributes);
    }
}