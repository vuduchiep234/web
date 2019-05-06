<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:43 PM
 */

namespace App\Http\Controllers\Requests\API\Category;


use App\Http\Controllers\Requests\API\PostRequest;

class CategoryPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.type' => 'string|required'
        ];
    }
}