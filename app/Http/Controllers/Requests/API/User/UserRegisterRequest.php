<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:30 PM
 */

namespace App\Http\Controllers\Requests\API\User;


class UserRegisterRequest extends UserPostRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(),
            [
                'c_password' => 'same:password|required'
            ]);
    }
}