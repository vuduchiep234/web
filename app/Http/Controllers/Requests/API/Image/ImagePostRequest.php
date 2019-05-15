<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:08 PM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\API\PostRequest;

class ImagePostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.image_name' => 'string|required',
            '*.image_url' => 'string|required'
        ];
    }
}