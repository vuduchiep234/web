<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:47 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Bill\BillGetRequest;
use App\Http\Controllers\Requests\API\Bill\BillPatchRequest;
use App\Http\Controllers\Requests\API\Bill\BillPostRequest;
use App\Http\Controllers\Requests\API\GetRequest;
use App\Proxies\ActivateBill\ActivateBillProxy;
use App\Proxies\ActivateBill\CancelBillProxy;

class BillController extends APIController
{
    private $billCanceller;
    private $billActivator;

    public function __construct(ActivateBillProxy $billActivator, CancelBillProxy $billCanceller)
    {
        parent::__construct($billActivator);
        $this->billCanceller = $billCanceller;
        $this->billActivator = $billActivator;
    }

    public function get(BillGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(BillPostRequest $request)
    {
        $this->service = $this->billActivator;
        return parent::_post($request);
    }

    public function patch(BillPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function cancel(BillPatchRequest $request, ?int $id = null)
    {
        $this->service = $this->billCanceller;
        return parent::_patch($request, $id);
    }

    public function getAll(BillGetRequest $request)
    {
        return parent::_getAll($request);
    }
}