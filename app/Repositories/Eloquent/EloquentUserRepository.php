<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:03 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\UserRepository;
use App\Models\User;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{
    public function __construct()
    {
        parent::__construct(User::query());
    }
}