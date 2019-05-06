<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:46 PM
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Requests\API\Role\RoleGetRequest;
use App\Http\Controllers\Requests\API\Role\RolePatchRequest;
use App\Http\Controllers\Requests\API\Role\RolePostRequest;
use App\Services\RoleService;

class RoleController extends APIController
{
    public function __construct(RoleService $service)
    {
        parent::__construct($service);
    }

    public function get(RoleGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(RolePostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(RolePatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(RoleGetRequest $request)
    {
        return parent::_getAll($request);
    }
}