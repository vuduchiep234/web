<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:44 PM
 */

namespace App\Http\Controllers\Requests\API\Category;


use App\Http\Controllers\Requests\API\PatchRequest;

class CategoryPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if($this->route('id')){
            return [
                'type' => 'string'
            ];
        }
        return [
            '*.id' => 'int|exists:categories,id',
            '*.type' => 'string'
        ];
    }
}