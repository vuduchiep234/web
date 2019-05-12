<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 12:00 PM
 */

namespace App\Decorators\Account;


use App\Decorators\EloquentDecorator;
use App\Services\UserService;

class EloquentUserDecorator extends EloquentDecorator
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }
}