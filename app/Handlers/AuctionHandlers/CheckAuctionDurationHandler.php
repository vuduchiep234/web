<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:16 PM
 */

namespace App\Handlers\AuctionHandlers;


use App\Handlers\HandlerResponse\HandlerResponse;
use DateTime;

class CheckAuctionDurationHandler extends EloquentAuctionHandler
{
    private static $INVALID_AUCTION = 'Time over';
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('auction_id', $attributes)) {
            return $this->createHandlerResponse('Missing auction_id', false);
        }
        $auctionService = $this->createHandlerService();
        $auction = $auctionService->getModel([], $attributes['auction_id']);

        $auctionDuration = $auction['duration'];
        $createTime = $auction['created_at'];
        $currentTime = date('Y-m-d h:i:s', time());

        try {
            $date1 = new DateTime($currentTime);
            $date2 = new DateTime($createTime);
        } catch (\Exception $e) {
            return $this->createHandlerResponse($e->getMessage(), false);
        }
        $diff = $date1->diff($date2);

        $currentDuration = $diff->format('%H:%i:%s');

        if (($currentDuration <= $auctionDuration)) {
            return parent::handle($attributes);
        }

        return $this->createHandlerResponse(self::$INVALID_AUCTION, false);
    }
}