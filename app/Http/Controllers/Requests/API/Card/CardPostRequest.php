<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:48 PM
 */

namespace App\Http\Controllers\Requests\API\Card;


use App\Http\Controllers\Requests\API\PostRequest;

class CardPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.user_id' => 'int|required|exists:users,id',
            '*.first_name' => 'string|required',
            '*.last_name' => 'string|required',
            '*.phone' => 'string|required|unique:cards,phone',
            '*.address' => 'string|required',
            '*.avatar_id' => 'url',
        ];
    }
}