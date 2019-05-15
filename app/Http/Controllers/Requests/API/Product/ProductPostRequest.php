<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:06 PM
 */

namespace App\Http\Controllers\Requests\API\Product;


use App\Http\Controllers\Requests\API\PostRequest;

class ProductPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'price' => 'int|required',
            'detail' => 'string|required',
            'producer_id' => 'int|required|exists:producers,id',
            'category_id' => 'int|required|exists:categories,id',
            'image_id' => 'int|required_without:file|exists:images,id',
            'file' => 'file',
            'state' => 'boolean|required'
        ];
    }
}