<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/26/2018
 * Time: 7:40 PM
 */

namespace App\Http\Controllers\Requests\API\Inventory;


use App\Http\Controllers\Requests\API\GetRequest;

class InventoryGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['product'];
    }

    protected function sort(): array
    {
        return ['id', 'product_id', 'quantity'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}