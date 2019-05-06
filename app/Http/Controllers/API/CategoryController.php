<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:51 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Category\CategoryGetRequest;
use App\Http\Controllers\Requests\API\Category\CategoryPatchRequest;
use App\Http\Controllers\Requests\API\Category\CategoryPostRequest;
use App\Services\CategoryService;

class CategoryController extends APIController
{
    public function __construct(CategoryService $service)
    {
        parent::__construct($service);
    }

    public function get(CategoryGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(CategoryPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(CategoryPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(CategoryGetRequest $request)
    {
        return parent::_getAll($request);
    }
}