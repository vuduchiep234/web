<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:08 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Auction;
use App\Repositories\AuctionRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentAuctionRepository extends EloquentRepository implements AuctionRepository
{
    public function __construct()
    {
        parent::__construct(Auction::query());
    }

    public function getBiggestOffer(int $productId): Model
    {
        $a = $this->newQuery()->where('product_id', '=', $productId)
            ->orderBy('offer', 'desc')->first();
        return $a;
    }

    public function getProductAuctions(int $productId, array $relations = [])
    {
        return $this->newQuery()->where('product_id', '=', $productId)->with($relations)->get();
    }
}