<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:10 PM
 */

namespace App\Services\Eloquent;

use App\Repositories\RoleRepository;
use App\Services\RoleService;

class EloquentRoleService extends EloquentService implements RoleService
{
    public function __construct(RoleRepository $repository)
    {
        parent::__construct($repository);
    }
}