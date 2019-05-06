<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:33 PM
 */

namespace App\Http\Controllers\Requests\API\BillDetail;


use App\Http\Controllers\Requests\API\PostRequest;

class BillDetailPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.product_id' => 'int|required|exists:products,id',
            '*.quantity' => 'int|required|min:0',
            '*.price' => 'int|required|min:0',
            '*.address' => 'string|required',
            '*.user_id' => 'int|required|exists:users,id'
        ];
    }
}