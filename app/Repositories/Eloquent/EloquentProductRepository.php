<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:46 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Product;
use App\Repositories\ProductRepository;

class EloquentProductRepository extends EloquentRepository implements ProductRepository
{
    public function __construct()
    {
        parent::__construct(Product::query());
    }
}