<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\Auction\CreateAuctionDecorator;
use App\Decorators\Auction\GetAuctionDecorator;
use App\Decorators\Message;
use App\Http\Controllers\Requests\API\Auction\AuctionAuctionRequest;
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
        return parent::_post($request);
    }

    public function auction(AuctionAuctionRequest $request, int $id = null)
    {
        $enhancedService = new CreateAuctionDecorator($this->getService());
        $this->setService($enhancedService);
        $checker =  $enhancedService->updateModel($request->all(), $id);
        if ($checker == false)
        {
            /**
             * @var Message $enhancedService
             */
            return response(['Error Message' => $enhancedService->getMessage()]);
        } else {
            return response(['Message' => 'Auction successful']);
        }
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
        $attributes['auction_id'] = $request->getAuctionId();
        $attributes['relations'] =  $request->getRelations();
        $enhancedService = new GetAuctionDecorator($service);
        $auction = $enhancedService->productAll($attributes, $attributes['auction_id']);
        return response([
            $auction
        ], 200);
    }

    public function getService(): AuctionService
    {
        return parent::getService();
    }
}