<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:04 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ProductRepository;
use App\Services\ProductService;

class EloquentProductService extends EloquentService implements ProductService
{
    public function __construct(ProductRepository $repository)
    {
        parent::__construct($repository);
    }
}