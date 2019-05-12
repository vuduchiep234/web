<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:32 PM
 */

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

interface AuctionProductService extends Service
{
    public function getWinner(array $attributes): Model;

    public function getProductAuctions(array $attributes);
}