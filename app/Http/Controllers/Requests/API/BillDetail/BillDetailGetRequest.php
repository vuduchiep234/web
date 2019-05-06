<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:31 PM
 */

namespace App\Http\Controllers\Requests\API\BillDetail;


use App\Http\Controllers\Requests\API\GetRequest;

class BillDetailGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['product', 'bill'];
    }

    protected function sort(): array
    {
        return ['id', 'product_id', 'quantity', 'price', 'day_created'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}