<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:21 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\PostRequest;

class UserLoginRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'username' => 'email|required|exists:users,email',
            'password' => 'string|min:0'
        ];
    }
}