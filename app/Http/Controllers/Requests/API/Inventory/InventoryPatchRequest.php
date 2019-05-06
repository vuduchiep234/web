<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/26/2018
 * Time: 7:43 PM
 */

namespace App\Http\Controllers\Requests\API\Inventory;


use App\Http\Controllers\Requests\API\PatchRequest;

class InventoryPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')){
            return [
                'product_id' => 'int|exists:products,id',
                'quantity' => 'int|min:0'
            ];
        }
        return [
            '*.id' => 'int|required|exists:inventories,id',
            '*.product_id' => 'int|exists:products,id',
            '*.quantity' => 'int|min:0'
        ];
    }
}