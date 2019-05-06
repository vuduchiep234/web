<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:01 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ProducerRepository;
use App\Services\ProducerService;

class EloquentProducerService extends EloquentService implements ProducerService
{
    public function __construct(ProducerRepository $repository)
    {
        parent::__construct($repository);
    }
}