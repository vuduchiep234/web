<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:32 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\AuctionProductRepository;
use App\Services\AuctionProductService;
use Illuminate\Database\Eloquent\Model;

class EloquentAuctionProductService extends EloquentService implements AuctionProductService
{
    public function __construct(AuctionProductRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getWinner(array $attributes): Model
    {
        /**
         * @var AuctionProductRepository $repository
         */
        $repository =$this->getRepository();
        return $repository->getBiggestOffer($attributes['product_id'], $attributes['auction_id']);
    }

    public function getProductAuctions(array $attributes)
    {
        /**
         * @var AuctionProductRepository $repository
         */
        $repository =$this->getRepository();
        return $repository->getProductAuctions($attributes['product_id'], $attributes['auction_id'], $attributes['relations']);
    }
}