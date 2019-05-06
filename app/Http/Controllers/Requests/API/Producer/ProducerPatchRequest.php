<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:36 PM
 */

namespace App\Http\Controllers\Requests\API\Producer;


use App\Http\Controllers\Requests\API\PatchRequest;

class ProducerPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'name' => 'string',
                'phone' => 'string|unique:producers,phone',
                'email' => 'email|unique:producers,email',
                'address' => 'string'
            ];
        }
        return [
            '*.id' => 'int|required|exists:producers,id',
            '*.name' => 'string',
            '*.phone' => 'string|unique:producers,phone|distinct',
            '*.email' => 'email|unique:producers,email|distinct',
            '*.address' => 'string'
        ];
    }
}