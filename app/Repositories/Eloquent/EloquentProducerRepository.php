<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:43 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Producer;
use App\Repositories\ProducerRepository;

class EloquentProducerRepository extends EloquentRepository implements ProducerRepository
{
    public function __construct()
    {
        parent::__construct(Producer::query());
    }
}