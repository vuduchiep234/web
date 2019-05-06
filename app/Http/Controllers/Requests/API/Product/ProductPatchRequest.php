<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:10 PM
 */

namespace App\Http\Controllers\Requests\API\Product;


use App\Http\Controllers\Requests\API\PatchRequest;

class ProductPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')){
            return [
                'name' => 'string',
                'price' => 'int',
                'detail' => 'string',
                'producer_id' => 'int|exists:producers,id',
                'category_id' => 'int|exists:categories,id',
                'image_id' => 'int|exists:images,id',
                'state' => 'boolean'
            ];
        }
        return [
            '*.id' => 'int|required|exists:products,id',
            '*.name' => 'string',
            '*.price' => 'int',
            '*.detail' => 'string',
            '*.producer_id' => 'int|exists:producers,id',
            '*.category_id' => 'int|exists:categories,id',
            '*.image_id' => 'int|exists:images,id',
            '*.state' => 'boolean'
        ];
    }
}