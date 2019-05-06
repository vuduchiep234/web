<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:10 PM
 */

namespace App\Services\Eloquent;

use App\Repositories\UserRepository;
use App\Services\UserService;

class EloquentUserService extends EloquentService implements UserService
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }
}