<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:25 PM
 */

namespace App\Decorators\Auction;


use App\Decorators\EloquentDecorator;
use App\Services\AuctionService;
use Illuminate\Database\Eloquent\Model;

class EloquentAuctionDecorator extends EloquentDecorator implements AuctionService
{
    public function __construct(AuctionService $service)
    {
        parent::__construct($service);
    }


    public function getWinner(array $attributes): Model
    {
        /**
         * @var AuctionService $service
         */
        $service = $this->getService();
        return $service->getWinner($attributes);
    }

    public function getProductAuctions(array $attributes)
    {
        /**
         * @var AuctionService $service
         */
        $service = $this->getService();
        return $service->getProductAuctions($attributes);
    }
}