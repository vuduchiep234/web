<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:00 PM
 */

namespace App\Http\Controllers\Requests\API\ExportBill;


use App\Http\Controllers\Requests\API\PatchRequest;

class ExportBillPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'creator_id' => 'int|exists:users,id',
                'bill_id' => 'int|exists:bills,id',
            ];
        }
        return [
            '*.id' => 'int|required|exists:export_bills,id',
            '*.creator_id' => 'int|exists:users,id',
            '*.bill_id' => 'int|exists:bills,id',
        ];
    }
}