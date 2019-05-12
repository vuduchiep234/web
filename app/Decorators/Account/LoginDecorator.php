<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:15 PM
 */

namespace App\Decorators\Account;


use App\Handlers\UserHandler\HashPasswordHandler;
use Illuminate\Database\Eloquent\Model;

class LoginDecorator extends EloquentUserDecorator
{
    public function getModel(array $attributes, $id): ?Model
    {
        $passwordHandler = new HashPasswordHandler();

        $passwordHandler->handle($attributes);

        $needles = ['email', 'password'];
        $values = [$attributes['username'], $attributes['password']];


        $user = $this->getBy($needles, $values);

        if ($user == null)
        {
            return null;
        }

        $id = $user['id'];
        return parent::getModel(['role', 'card'], $id);
    }
}