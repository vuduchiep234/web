<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:10 PM
 */

namespace App\Handlers\UserHandler;


use App\Handlers\BaseHandler;
use App\Handlers\HandlerResponse\HandlerResponse;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Services\Eloquent\EloquentRoleService;
use App\Services\Service;

class FindRoleHandler extends BaseHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $service = $this->createHandlerService();

        $needle = ['type'];
        $value = ['user'];

        $role = $service->getBy($needle, $value);
        $attributes['role_id'] = $role['id'];

        return parent::handle($attributes);
    }

    public function createHandlerService(): Service
    {
        return new EloquentRoleService(new EloquentRoleRepository());
    }
}