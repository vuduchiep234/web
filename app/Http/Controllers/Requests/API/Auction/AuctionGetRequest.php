<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:28 PM
 */

namespace App\Http\Controllers\Requests\API\Auction;


use App\Http\Controllers\Requests\API\GetRequest;

class AuctionGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['user', 'product'];
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