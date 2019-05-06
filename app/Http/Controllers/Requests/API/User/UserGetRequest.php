<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:33 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\API\GetRequest;

class UserGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['role', 'image', 'comments', 'bill', 'exportBills', 'importBills'];
    }

    protected function sort(): array
    {
        return ['id', 'first_name', 'last_name', 'role_id'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}