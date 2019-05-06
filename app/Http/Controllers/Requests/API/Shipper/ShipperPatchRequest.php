<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:21 PM
 */

namespace App\Http\Controllers\Requests\API\Shipper;


use App\Http\Controllers\Requests\API\PatchRequest;

class ShipperPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'name' => 'string',
                'state' => 'boolean',
                'phone' => 'string|unique:shippers,phone'
            ];
        }
        return [
            '*.id' => 'int|required|exists:shippers,id',
            '*.name' => 'string',
            '*.state' => 'boolean',
            '*.phone' => 'string|unique:shippers,phone|distinct'
        ];
    }
}