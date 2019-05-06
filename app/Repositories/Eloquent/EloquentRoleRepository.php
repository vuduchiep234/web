<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:03 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\RoleRepository;
use App\Models\Role;

class EloquentRoleRepository extends EloquentRepository implements RoleRepository
{
    public function __construct()
    {
        parent::__construct(Role::query());
    }
}