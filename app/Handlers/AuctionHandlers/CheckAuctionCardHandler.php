<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/23/2019
 * Time: 3:39 AM
 */

namespace App\Handlers\AuctionHandlers;


use App\Handlers\HandlerResponse\HandlerResponse;
use App\Handlers\UserHandler\CheckUserCardHandler;

class CheckAuctionCardHandler extends EloquentAuctionHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $userCardHandler = new CheckUserCardHandler();
        $response = $userCardHandler->handle($attributes);

        if ($response->getResponseStatus() == false) {
            return $this->createHandlerResponse($response->getResponseMessage(), false);
        }

        return parent::handle($attributes);
    }
}