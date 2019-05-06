<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/26/2018
 * Time: 7:41 PM
 */

namespace App\Http\Controllers\Requests\API\Inventory;


use App\Http\Controllers\Requests\API\PostRequest;

class InventoryPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.product_id' => 'int|required|exists:products,id',
            '*.quantity' => 'int|required|min:0'
        ];
    }
}