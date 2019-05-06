<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 2:01 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Producer\ProducerGetRequest;
use App\Http\Controllers\Requests\API\Producer\ProducerPatchRequest;
use App\Http\Controllers\Requests\API\Producer\ProducerPostRequest;
use App\Services\ProducerService;

class ProducerController extends APIController
{
    public function __construct(ProducerService $service)
    {
        parent::__construct($service);
    }

    public function get(ProducerGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(ProducerPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(ProducerPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(ProducerGetRequest $request)
    {
        return parent::_getAll($request);
    }
}