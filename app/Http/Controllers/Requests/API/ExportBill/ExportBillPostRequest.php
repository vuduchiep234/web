<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:58 PM
 */

namespace App\Http\Controllers\Requests\API\ExportBill;


use App\Http\Controllers\Requests\API\PostRequest;

class ExportBillPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.creator_id' => 'int|required|exists:users,id',
            '*.bill_id' => 'int|required|exists:bills,id'
        ];
    }
}