<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:31 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\AuctionProduct;
use App\Repositories\AuctionProductRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentAuctionProductRepository extends EloquentRepository implements AuctionProductRepository
{
    public function __construct()
    {
        parent::__construct(AuctionProduct::query());
    }

    public function getBiggestOffer(int $productId, int $auctionId): Model
    {
        $a = $this->newQuery()->where('product_id', '=', $productId)
            ->where('auction_id', '=', $auctionId)
            ->orderBy('offer', 'desc')->first();
        return $a;
    }

    public function getProductAuctions(int $productId, int $auctionId, array $relations = [])
    {
        return $this->newQuery()->where('product_id', '=', $productId)
            ->where('auction_id', '=', $auctionId)->with($relations)->get();
    }
}