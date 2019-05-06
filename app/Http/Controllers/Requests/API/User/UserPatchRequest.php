<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:38 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\PatchRequest;

class UserPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if($this->route('id')){
            return [
                'first_name' => 'string',
                'last_name' => 'string',
                'email' => 'email|unique:users,email',
                'phone' => 'string|unique:users,phone',
                'password'=>'string|min:6',
                'role' => 'int|exists:roles,id',
                'image' => 'int|exists:images,id'
            ];
        }
        return [
            '*.id' => 'int|exists:users,id',
            '*.first_name' => 'string',
            '*.last_name' => 'string',
            '*.email'=> 'email|unique:users,email|distinct',
            '*.phone'=> 'string|unique:users,phone|distinct',
            '*.password'=>'string|min:6',
            '*.role' => 'int|exists:roles,id',
            '*.image' => 'int|exists:images,id'
        ];
    }
}