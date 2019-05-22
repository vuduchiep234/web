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
                'email' => 'email|unique:users,email',
                'name' => 'string|'
            ];
        }
        return [
            '*.id' => 'int|exists:users,id',
            '*.email'=> 'email|unique:users,email|distinct',
            '*.name' => 'string|'
        ];
    }
}