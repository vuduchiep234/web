<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:09 PM
 */

namespace App\Decorators\Auction;


use App\Handlers\AuctionProductHandler\GetAuctionProductWinnerHandler;
use App\Handlers\ProductHandlers\GetProductHandler;
use Illuminate\Database\Eloquent\Model;

class GetAuctionDecorator extends EloquentAuctionDecorator
{
    public function productAll(array $attributes, $id): ?Model
    {
        $auction = parent::getModel(['auctionProducts'], $id);
        $getAuctionWinnerHandler = new GetAuctionProductWinnerHandler();
        $getProductHandler = new GetProductHandler();

        $getAuctionWinnerHandler->setNextHandler($getProductHandler);

        $getAuctionWinnerHandler->handle($attributes);
        $auction['winner'] = $attributes['winner'];
        $auction['product'] = $attributes['product'];
        return $auction;
    }
}