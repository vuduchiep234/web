<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:48 PM
 */

namespace App\Http\Controllers\Requests\API\Card;


use App\Http\Controllers\Requests\API\GetRequest;

class CardGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['user'];
    }

    protected function sort(): array
    {
        return ['id'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}