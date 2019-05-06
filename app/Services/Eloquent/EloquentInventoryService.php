<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/26/2018
 * Time: 7:39 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\InventoryRepository;
use App\Services\InventoryService;

class EloquentInventoryService extends EloquentService implements InventoryService
{
    public function __construct(InventoryRepository $repository)
    {
        parent::__construct($repository);
    }
}