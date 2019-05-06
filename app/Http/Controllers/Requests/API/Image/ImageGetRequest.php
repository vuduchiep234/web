<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:06 PM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\API\GetRequest;

class ImageGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['users', 'products'];
    }

    protected function sort(): array
    {
        return ['id', 'name', 'day_created'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}