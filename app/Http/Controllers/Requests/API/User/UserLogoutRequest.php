<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:21 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\PostRequest;

class UserLogoutRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required',
        ];
    }
}