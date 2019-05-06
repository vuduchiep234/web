<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:31 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\API\GetRequest;

class RoleGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['users'];
    }

    protected function sort(): array
    {
        return ['id'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}