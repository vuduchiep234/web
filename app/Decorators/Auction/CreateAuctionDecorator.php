<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:08 PM
 */

namespace App\Decorators\Auction;

use App\Handlers\AuctionHandlers\CheckAuctionCardHandler;
use App\Handlers\AuctionHandlers\CheckAuctionDurationHandler;
use App\Handlers\AuctionProductHandler\CreateAuctionProductHandler;
use App\Handlers\UserHandler\CheckUserSessionHandler;


class CreateAuctionDecorator extends EloquentAuctionDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $userHandler = new CheckUserSessionHandler();
        $cardHandler = new CheckAuctionCardHandler();
        $timeHandler = new CheckAuctionDurationHandler();
        $auctionProductHandler = new CreateAuctionProductHandler();

        $userHandler->setNextHandler($cardHandler);
        $cardHandler->setNextHandler($timeHandler);
        $timeHandler->setNextHandler($auctionProductHandler);

        $response = $userHandler->handle($attributes);

        if ($response->getResponseStatus() == true) {
            return true;
        } else {
            $this->setMessage($response->getResponseMessage());
            return false;
        }
    }
}