<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/8/2018
 * Time: 7:21 PM
 */

namespace App\Http\Controllers\Requests\Admin;


use App\Http\Controllers\Requests\RestfulRequest;

class RegisterRequest extends RestfulRequest
{
    public function rules(): array
    {
        return [
            'email' => 'email|required|unique:users,email',
            'first_name'  => 'string|required',
            'last_name'  => 'string|required',
            'phone' => 'string|required|unique:users,phone',
            'password' => 'string|min:6|required',
            'c_password' => 'string|same:password'
        ];
    }
}