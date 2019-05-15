<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 2:02 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\CreateProduct\CreateProductTransaction;
use App\Http\Controllers\Requests\API\GetRequest;
use App\Http\Controllers\Requests\API\Product\ProductGetRequest;
use App\Http\Controllers\Requests\API\Product\ProductPatchRequest;
use App\Http\Controllers\Requests\API\Product\ProductPostRequest;
use App\Services\ProductService;

class ProductController extends APIController
{
    public function __construct(CreateProductTransaction $decorator)
    {
        parent::__construct($decorator);
    }

    public function get(ProductGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(ProductPostRequest $request)
    {
        $service = $this->getService();
        return $service->createNewModel($request->all());
    }

    public function patch(ProductPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(ProductGetRequest $request)
    {
        return parent::_getAll($request);
    }

    public function getService(): ProductService
    {
        return parent::getService();
    }
}