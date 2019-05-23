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

class EloquentAuctionRepository extends EloquentRepository implements AuctionRepository
{
    public function __construct()
    {
        parent::__construct(Auction::query());
    }
}