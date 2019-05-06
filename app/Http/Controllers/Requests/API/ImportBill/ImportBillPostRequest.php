<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:20 PM
 */

namespace App\Http\Controllers\Requests\API\ImportBill;


use App\Http\Controllers\Requests\API\PostRequest;

class ImportBillPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.creator_id' => 'int|required|exists:users,id',
            '*.product_id' => 'int|required|exists:products,id',
            '*.quantity' => 'int|required|min:0',
            '*.price' => 'int|required|min:0'
        ];
    }
}