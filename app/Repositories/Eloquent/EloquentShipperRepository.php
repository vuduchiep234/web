<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:44 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Shipper;
use App\Repositories\ShipperRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentShipperRepository extends EloquentRepository implements ShipperRepository
{
    public function __construct()
    {
        parent::__construct(Shipper::query());
    }

    public function random(): ?Model
    {
        $builder = $this->getQuery();
        $model = $builder->where('state', '=', true)->inRandomOrder()->first();

        return $model;
    }
}