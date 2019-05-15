<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/15/2019
 * Time: 2:41 PM
 */

namespace App\Handlers\ImageHandler\Eloquent;


use App\Handlers\BaseEloquentHandler;
use App\Repositories\Eloquent\EloquentImageRepository;
use App\Services\Eloquent\EloquentImageService;
use App\Services\Service;

class EloquentImageHandler extends BaseEloquentHandler
{

    public function createHandlerService(): Service
    {
        return new EloquentImageService(new EloquentImageRepository());
    }
}