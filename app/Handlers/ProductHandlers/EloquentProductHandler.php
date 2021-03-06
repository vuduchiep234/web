<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:45 PM
 */

namespace App\Handlers\ProductHandlers;


use App\Handlers\BaseEloquentHandler;
use App\Repositories\Eloquent\EloquentProductRepository;
use App\Services\Eloquent\EloquentProductService;
use App\Services\Service;

class EloquentProductHandler extends BaseEloquentHandler
{

    public function createHandlerService(): Service
    {
        return new EloquentProductService(new EloquentProductRepository());
    }
}