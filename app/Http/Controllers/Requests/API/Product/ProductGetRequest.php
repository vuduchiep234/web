<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 10:03 PM
 */

namespace App\Http\Controllers\Requests\API\Product;


use App\Http\Controllers\Requests\API\GetRequest;

class ProductGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['producer', 'category', 'image', 'comments', 'billDetails', 'importBills', 'inventory'];
    }

    protected function sort(): array
    {
        return ['id', 'name', 'price', 'product_id', 'category_id', 'state'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}