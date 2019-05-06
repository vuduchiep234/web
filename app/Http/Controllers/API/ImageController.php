<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:44 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\GetRequest;
use App\Http\Controllers\Requests\API\Image\ImageGetRequest;
use App\Http\Controllers\Requests\API\Image\ImagePatchRequest;
use App\Http\Controllers\Requests\API\Image\ImagePostRequest;
use App\Services\ImageService;

class ImageController extends APIController
{
    public function __construct(ImageService $service)
    {
        parent::__construct($service);
    }

    public function get(ImageGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(ImagePostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(ImagePatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(ImageGetRequest $request)
    {
        return parent::_getAll($request);
    }
}