<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:49 PM
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Requests\API\BillDetail\BillDetailGetRequest;
use App\Http\Controllers\Requests\API\BillDetail\BillDetailPatchRequest;
use App\Http\Controllers\Requests\API\BillDetail\BillDetailPostRequest;
use App\Proxies\PurchaseProduct\PurchaseProductProxy;

class BillDetailController extends APIController
{
    public function __construct(PurchaseProductProxy $service)
    {
        parent::__construct($service);
    }

    public function get(BillDetailGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(BillDetailPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(BillDetailPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }
}