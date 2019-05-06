<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:02 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ShipperRepository;
use App\Services\ShipperService;
use Illuminate\Database\Eloquent\Model;

class EloquentShipperService extends EloquentService implements ShipperService
{
    public function __construct(ShipperRepository $repository)
    {
        parent::__construct($repository);
    }

    public function findRandomShipper(): ?Model
    {
        /**
         * @var ShipperRepository $shipperRepository
         */
        $shipperRepository = $this->getRepository();
        $shipper = $shipperRepository->random();

        return $shipper;
    }
}