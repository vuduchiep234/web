<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:09 PM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\API\PatchRequest;

class ImagePatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'name' => 'string',
                'content' => 'string'
            ];
        }
        return [
            '*.id' => 'int|required|exists:images,id',
            '*.name' => 'string',
            '*.content' => 'string'
        ];
    }
}