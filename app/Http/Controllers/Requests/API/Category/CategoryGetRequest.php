<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:41 PM
 */

namespace App\Http\Controllers\Requests\API\Category;


use App\Http\Controllers\Requests\API\GetRequest;

class CategoryGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['products'];
    }

    protected function sort(): array
    {
        return ['id', 'type'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}