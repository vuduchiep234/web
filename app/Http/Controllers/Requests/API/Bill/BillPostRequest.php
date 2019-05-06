<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:19 PM
 */

namespace App\Http\Controllers\Requests\API\Bill;


use App\Http\Controllers\Requests\API\PostRequest;

class BillPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.billdetail_id' => 'int|required|exists:bill_details,id',
            '*.user_id' => 'int|required|exists:users,id',
            '*.shipper_id' => 'int|required|exists:shippers,id',
            '*.state'   => 'string|required|in:unactivated,activated,onShipping,done,cancelled'
        ];
    }
}