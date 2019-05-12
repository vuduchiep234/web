<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 4:01 PM
 */

namespace App\Decorators\Account;


use App\Handlers\UserHandler\HashPasswordHandler;

class ChangePasswordDecorator extends EloquentUserDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $passwordHandler = new HashPasswordHandler();
        $attributes['password'] = $attributes['old_password'];
        $passwordHandler->handle($attributes);
        $user = $this->getBy(['id', 'password'], [session('user_id'), $attributes['password']]);

        if ($user != null) {
            $attributes['password'] = $attributes['new_password'];
            $passwordHandler->handle($attributes);
            return parent::updateModel($attributes, $user['id']);
        } else {
            $this->setMessage('Invalid old password');
            return false;
        }

    }
}