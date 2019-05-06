<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:40 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Category;
use App\Repositories\CategoryRepository;

class EloquentCategoryRepository extends EloquentRepository implements CategoryRepository
{
    public function __construct()
    {
        parent::__construct(Category::query());
    }
}