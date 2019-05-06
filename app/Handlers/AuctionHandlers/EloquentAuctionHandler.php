<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:46 PM
 */

namespace App\Handlers\AuctionHandlers;


use App\Handlers\BaseEloquentHandler;
use App\Repositories\Eloquent\EloquentAuctionRepository;
use App\Services\Eloquent\EloquentAuctionService;
use App\Services\Service;

class EloquentAuctionHandler extends BaseEloquentHandler
{

    public function createHandlerService(): Service
    {
        return new EloquentAuctionService(new EloquentAuctionRepository());
    }
}