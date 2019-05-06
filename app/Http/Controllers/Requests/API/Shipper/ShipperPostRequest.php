<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:15 PM
 */

namespace App\Http\Controllers\Requests\API\Shipper;


use App\Http\Controllers\Requests\API\PostRequest;

class ShipperPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.name' => 'string|required',
            '*.phone' => 'string|required|unique:shippers,phone|distinct',
            '*.state' => 'boolean|required',
        ];
    }
}