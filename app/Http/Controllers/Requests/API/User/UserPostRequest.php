<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:35 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\PostRequest;

class UserPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'email' => 'email|required|unique:users,email|distinct',
            'password' => 'string|required|min:6',
            'name' => 'string|required'
        ];
    }
}