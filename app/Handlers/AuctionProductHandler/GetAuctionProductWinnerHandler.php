<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:53 PM
 */

namespace App\Handlers\AuctionProductHandler;


use App\Handlers\HandlerResponse\HandlerResponse;
use App\Services\AuctionProductService;

class GetAuctionProductWinnerHandler extends EloquentAuctionProductHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('auction_id', $attributes)) {
            return $this->createHandlerResponse('Missing action id', false);
        }
        if (!array_key_exists('product_id', $attributes)) {
            return $this->createHandlerResponse('Missing product id', false);
        }
        /**
         * @var AuctionProductService $auctionProductService
         */
        $auctionProductService = $this->createHandlerService();

        $attributes['winner'] = $auctionProductService->getWinner($attributes);

        return parent::handle($attributes);
    }
}