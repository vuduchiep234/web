<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:32 PM
 */

namespace App\Http\Controllers\Requests\API\Producer;


use App\Http\Controllers\Requests\API\GetRequest;

class ProducerGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['products'];
    }

    protected function sort(): array
    {
        return ['id', 'phone', 'name'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}