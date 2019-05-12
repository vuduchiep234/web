<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:00 PM
 */

namespace App\Decorators\Account;


use App\Handlers\UserHandler\FindRoleHandler;
use App\Handlers\UserHandler\HashPasswordHandler;
use Illuminate\Database\Eloquent\Model;

class RegisterDecorator extends EloquentUserDecorator
{
    public function createNewModel(array $attributes): ?Model
    {
        $passwordHandler = new HashPasswordHandler();
        $roleHandler = new FindRoleHandler();

        $passwordHandler->setNextHandler($roleHandler);
        $passwordHandler->handle($attributes);

        return parent::createNewModel($attributes);
    }
}