<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:09 PM
 */

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

interface AuctionService extends Service
{
    public function getWinner(array $attributes): Model;

    public function getProductAuctions(array $attributes);
}