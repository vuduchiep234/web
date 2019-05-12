<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:50 PM
 */

namespace App\Handlers\AuctionProductHandler;


use App\Handlers\BaseEloquentHandler;
use App\Repositories\Eloquent\EloquentAuctionProductRepository;
use App\Services\Eloquent\EloquentAuctionProductService;
use App\Services\Service;

class EloquentAuctionProductHandler extends BaseEloquentHandler
{

    public function createHandlerService(): Service
    {
        return new EloquentAuctionProductService(new EloquentAuctionProductRepository());
    }
}