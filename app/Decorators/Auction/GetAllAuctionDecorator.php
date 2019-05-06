<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:43 PM
 */

namespace App\Decorators\Auction;


class GetAllAuctionDecorator extends EloquentAuctionDecorator
{
    public function getAll(array $relation = [])
    {
        return parent::getAll($relation);
    }
}