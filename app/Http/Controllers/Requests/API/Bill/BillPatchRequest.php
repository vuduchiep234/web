<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:26 PM
 */

namespace App\Http\Controllers\Requests\API\Bill;


use App\Http\Controllers\Requests\API\PatchRequest;

class BillPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'billdetail_id' => 'int|exists:bill_details,id',
                'user_id' => 'int|exists:users,id',
                'shipper_id' => 'int|exists:shippers,id',
                'state' => 'string|required|in:unactivated,activated,onShipping,done,cancelled'
            ];
        }
        return [
            '*.id' => 'int|required|exists:bills,id',
            '*.billdetail_id' => 'int|exists:bill_details,id',
            '*.user_id' => 'int|exists:users,id',
            '*.shipper_id' => 'int|exists:shippers,id',
            '*.state' => 'string|required|in:unactivated,activated,onShipping,done,cancelled'
        ];
    }
}