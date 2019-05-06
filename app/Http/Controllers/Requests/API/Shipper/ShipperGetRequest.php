<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:14 PM
 */

namespace App\Http\Controllers\Requests\API\Shipper;


use App\Http\Controllers\Requests\API\GetRequest;

class ShipperGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['bills'];
    }

    protected function sort(): array
    {
        return ['id', 'state'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}