<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:08 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface AuctionRepository extends Repository
{
    public function getBiggestOffer(int $productId): Model;

    public function getProductAuctions(int $productId, array $relations = []);
}