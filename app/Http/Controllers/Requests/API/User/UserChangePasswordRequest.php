<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:21 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\PostRequest;

class UserChangePasswordRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'old_password' => 'string|required',
            'new_password' => 'string|required|min:6',
            'c_password' => 'same:new_password',
        ];
    }
}