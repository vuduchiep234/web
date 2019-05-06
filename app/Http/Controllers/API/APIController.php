<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:16 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\API\GetRequest;
use App\Http\Controllers\Requests\API\PatchRequest;
use App\Http\Controllers\Requests\API\PostRequest;
use App\Services\Service;
use Illuminate\Support\Facades\Input;

class APIController extends Controller
{
    use ResponseRequest;

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function _get(GetRequest $request, $id)
    {
        if ($id) {
            $model = $this->service->getModel($request->getRelations(), $id);
            return $this->getResponse($model, null);
        }
        $requestId = $request->getId();
        if ($requestId) {
            $model = $this->service->getModel($request->getRelations(), $requestId);
            return $this->getResponse($model, null);
        }
        return $this->notFound();
    }

    public function _post(PostRequest $request)
    {
        $success = [];
        $fail = [];
        foreach ($request->all() as $item) {
            $model = $this->service->createNewModel($item);
            if ($model) {
                array_push($success, $model);
            } else {
                array_push($fail, $model);
            }
        }
        return $this->createResponse($success, $fail);
    }

    public function _patch(PatchRequest $request, $id)
    {
        $success = [];
        $fail = [];
        if ($id) {
            $model = $this->service->updateModel($request->all(), $id);
            if ($model == true) {
                array_push($success, $model);
            } else {
                array_push($fail, $model);
            }
        } else {
            foreach ($request->all() as $item) {
                $requestId = $item['id'];
                $model = $this->service->updateModel($item, $requestId);
                if ($model) {
                    array_push($success, $model);
                } else {
                    array_push($fail, $model);
                }
            }
        }
        return $this->updateResponse($success, $fail);
    }

    public function _delete($id)
    {
        if ($this->service->deleteModel($id)) {
            return $this->deleteResponse();
        }
        return $this->notFound();
    }

    public function _getAll(GetRequest $request)
    {
        return $this->service->getAll($request->getRelations());
    }

    public function _getBetween(GetRequest $request)
    {
        $filterRules = $request->getFilterRules();
        $from = $filterRules['from'];
        $to = $filterRules['to'];
        return $this->service->getBetween('created_at', $from, $to, $request->getRelations());
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService(Service $service)
    {
        $this->service = $service;
    }
}