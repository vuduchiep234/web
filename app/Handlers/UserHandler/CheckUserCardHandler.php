<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/23/2019
 * Time: 3:40 AM
 */

namespace App\Handlers\UserHandler;


use App\Handlers\HandlerResponse\HandlerResponse;

class CheckUserCardHandler extends EloquentUserHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $userService = $this->createHandlerService();
        $user = $userService->getModel(['card'], session('user_id'));
        if ($user['card'] == null) {
            return $this->createHandlerResponse('Must register card to continue', false);
        }
        return parent::handle($attributes);
    }
}