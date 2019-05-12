<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:51 PM
 */

namespace App\Handlers\AuctionProductHandler;


use App\Handlers\HandlerResponse\HandlerResponse;

class CreateAuctionProductHandler extends EloquentAuctionProductHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $auctionProductService = $this->createHandlerService();
        $auctionProduct = $auctionProductService->createNewModel($attributes);
        if ($auctionProduct == null ) {
            return $this->createHandlerResponse('Create Auction product failed', false);
        }
        return parent::handle($attributes);
    }
}