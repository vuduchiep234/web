<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:48 PM
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Requests\API\GetRequest;
use App\Http\Controllers\Requests\API\User\UserGetRequest;
use App\Http\Controllers\Requests\API\User\UserPatchRequest;
use App\Http\Controllers\Requests\API\User\UserPostRequest;
use App\Services\UserService;

class UserController extends APIController
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }

    public function get(UserGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(UserPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(UserPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(UserGetRequest $request)
    {
        return parent::_getAll($request);
    }
}