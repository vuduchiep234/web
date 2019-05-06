<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 3:15 PM
 */

namespace App\Proxies\ImportProduct\Eloquent;


use App\Decorators\ImportProduct\ImportProductDecorator;
use App\Proxies\EloquentProxy;
use App\Proxies\ImportProduct\ImportProductProxy;
use App\Services\UserService;

class EloquentImportProduct extends EloquentProxy implements ImportProductProxy
{
    private $userService;

    public function __construct(ImportProductDecorator $decorator, UserService $userService)
    {
        parent::__construct($decorator);
        $this->userService = $userService;
    }

    function checkUpdate(array $attributes, $id): bool
    {
        return true;
    }

    function checkCreate(array $attributes): bool
    {
        $creatorId = $attributes['creator_id'];

        $creator = $this->userService->getModel(['role'], $creatorId);
        $creatorRole = $creator['role'];
        if ($creatorRole['id'] == 1){
            return true;
        }
        return false;
    }
}