<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/26/2018
 * Time: 7:37 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Inventory;
use App\Repositories\InventoryRepository;

class EloquentInventoryRepository extends EloquentRepository implements InventoryRepository
{
    public function __construct()
    {
        parent::__construct(Inventory::query());
    }
}