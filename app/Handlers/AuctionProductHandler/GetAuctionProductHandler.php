<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:53 PM
 */

namespace App\Handlers\AuctionProductHandler;


use App\Handlers\HandlerResponse\HandlerResponse;

class GetAuctionProductHandler extends EloquentAuctionProductHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('auction_id', $attributes)) {
            return $this->createHandlerResponse('Missing action id', false);
        }
        if (!array_key_exists('product_id', $attributes)) {
            return $this->createHandlerResponse('Missing product id', false);
        }

        $auctionProductService = $this->createHandlerService();
        $needles = ['auction_id', 'product_id'];
        $value = ['value_id', 'product_id'];

        $attributes['auction_product'] = $auctionProductService->getBy($needles, $value);

        return parent::handle($attributes);
    }
}