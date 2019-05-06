<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:59 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\CategoryRepository;
use App\Services\CategoryService;

class EloquentCategoryService extends EloquentService implements CategoryService
{
    public function __construct(CategoryRepository $repository)
    {
        parent::__construct($repository);
    }
}