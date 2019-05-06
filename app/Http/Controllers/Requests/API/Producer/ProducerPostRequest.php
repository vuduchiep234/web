<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:34 PM
 */

namespace App\Http\Controllers\Requests\API\Producer;


use App\Http\Controllers\Requests\API\PostRequest;

class ProducerPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.name' => 'string|required',
            '*.phone' => 'string|required|unique:producers,phone|distinct',
            '*.address' => 'string|required',
            '*.email' => 'email|required|unique:producers,email|distinct'
        ];
    }
}