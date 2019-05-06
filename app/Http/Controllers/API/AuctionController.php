<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\Auction\CreateAuctionDecorator;
use App\Decorators\Auction\GetAuctionWinnerDecorator;
use App\Http\Controllers\Requests\API\Auction\AuctionGetRequest;
use App\Http\Controllers\Requests\API\Auction\AuctionPatchRequest;
use App\Http\Controllers\Requests\API\Auction\AuctionPostRequest;
use App\Http\Controllers\Requests\API\Auction\AuctionProductGetRequest;
use App\Services\AuctionService;

class AuctionController extends APIController
{
    public function __construct(AuctionService $service)
    {
        parent::__construct($service);
    }

    public function get(AuctionGetRequest $request, $id)
    {
        return parent::_get($request, $id);
    }

    public function post(AuctionPostRequest $request)
    {
        $enhancedService = new CreateAuctionDecorator($this->getService());
        $this->setService($enhancedService);
        return parent::_post($request);
    }

    public function patch(AuctionPatchRequest $request, $id)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function all(AuctionGetRequest $request)
    {
        return parent::_getAll($request);
    }

    public function productAll(AuctionProductGetRequest $request)
    {
        $service = $this->getService();
        $attributes['product_id'] = $request->getProductId();
        $attributes['relations'] =  $request->getRelations();
        $winner = $service->getWinner($attributes);
        $productAuction = $service->getProductAuctions($attributes);
        return response([
            'auctions' => $productAuction,
            'winner' => $winner
        ]);
    }


    public function getService(): AuctionService
    {
        return parent::getService();
    }
}