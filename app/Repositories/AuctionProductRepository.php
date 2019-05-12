<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:31 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface AuctionProductRepository extends Repository
{
    public function getBiggestOffer(int $productId, int $auctionId): Model;

    public function getProductAuctions(int $productId, int $auctionId, array $relations = []);
}