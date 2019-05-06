<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:53 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Comment\CommentGetRequest;
use App\Http\Controllers\Requests\API\Comment\CommentPatchRequest;
use App\Http\Controllers\Requests\API\Comment\CommentPostRequest;
use App\Services\CommentService;

class CommentController extends APIController
{
    public function __construct(CommentService $service)
    {
        parent::__construct($service);
    }

    public function get(CommentGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(CommentPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(CommentPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }
}