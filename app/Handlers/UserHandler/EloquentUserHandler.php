<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:28 PM
 */

namespace App\Handlers\UserHandler;


use App\Handlers\BaseEloquentHandler;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\Eloquent\EloquentUserService;
use App\Services\Service;

class EloquentUserHandler extends BaseEloquentHandler
{

    public function createHandlerService(): Service
    {
        return new EloquentUserService(new EloquentUserRepository());
    }
}