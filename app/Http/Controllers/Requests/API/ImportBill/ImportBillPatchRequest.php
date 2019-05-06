<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:26 PM
 */

namespace App\Http\Controllers\Requests\API\ImportBill;


use App\Http\Controllers\Requests\API\PatchRequest;

class ImportBillPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'creator_id' => 'int|exists:users,id',
                'product_id' => 'int|exists:products,id',
                'quantity' => 'int|min:0',
                'price' => 'int|min:0'
            ];
        }
        return [
            '*.id' => 'int|required|exists:import_bills,id',
            '*.creator_id' => 'int|exists:users,id',
            '*.product_id' => 'int|exists:products,id',
            '*.quantity' => 'int|min:0',
            '*.price' => 'int|min:0'
        ];
    }
}