<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 4:59 PM
 */

namespace App\Decorators\FindShipper\EloquentFindShipper;


use App\Decorators\EloquentDecorator;
use App\Decorators\FindShipper\FindShipperDecorator;
use App\Services\ShipperService;
use Illuminate\Database\Eloquent\Model;

/**
 * Find a random available shipper
 * Class EloquentFindShipper
 * @package App\Decorators\FindShipper\EloquentFindShipper
 */
class EloquentFindShipper extends EloquentDecorator implements FindShipperDecorator
{
    public function __construct(ShipperService $shipperService)
    {
        parent::__construct($shipperService);
    }

    /**
     * Find a random shipper
     * @return Model|null
     */
    public function findRandomShipper(): ?Model
    {
        /**
         * @var ShipperService $shipperService
         */
        $shipperService = $this->service;
        return $shipperService->findRandomShipper();
    }
}