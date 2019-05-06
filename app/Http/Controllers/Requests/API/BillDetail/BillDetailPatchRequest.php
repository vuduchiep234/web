<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:35 PM
 */

namespace App\Http\Controllers\Requests\API\BillDetail;


use App\Http\Controllers\Requests\API\PatchRequest;

class BillDetailPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if($this->route('id')){
            return [
                'product_id' => 'int|exists:products,id',
                'quantity'  => 'int|min:0',
                'price' => 'int|min:0',
                'address' => 'string',
                'user_id' => 'int|exists:users,id'
            ];
        }
        return [
            '*.id' => 'int|required|exists:bill_details,id',
            '*.product_id' => 'int|exists:products,id',
            '*.price' => 'int|min:0',
            '*.quantity' => 'int|min:0',
            '*.address' => 'string',
            '*.user_id' => 'int|exists:users,id'
        ];
    }
}