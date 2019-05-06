<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:09 PM
 */

namespace App\Decorators\Auction;


use Illuminate\Database\Eloquent\Model;

class GetAuctionWinnerDecorator extends EloquentAuctionDecorator
{
    public function getProductAuctions(array $attributes): ?Model
    {
        $auction = parent::getProductAuctions($attributes);
        $winner = $this->getWinner($attributes);
        $auction['winner'] = $winner;
        return $auction;
    }
}