<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:09 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\AuctionRepository;
use App\Services\AuctionService;
use Illuminate\Database\Eloquent\Model;

class EloquentAuctionService extends EloquentService implements AuctionService
{
    public function __construct(AuctionRepository $repository)
    {
        parent::__construct($repository);
    }
}