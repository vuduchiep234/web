<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:27 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\API\PostRequest;

class RolePostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            '*.type' => 'string|required'
        ];
    }
}