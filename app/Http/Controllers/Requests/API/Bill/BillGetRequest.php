<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 7:36 PM
 */

namespace App\Http\Controllers\Requests\API\Bill;


use App\Http\Controllers\Requests\API\GetRequest;

class BillGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['billDetail', 'user', 'shipper', 'exportBill'];
    }

    protected function sort(): array
    {
        return ['id', 'billdetail_id', 'user_id', 'shipper_id', 'day_created', 'state'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}