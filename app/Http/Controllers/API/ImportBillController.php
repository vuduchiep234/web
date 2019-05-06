<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:59 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\ImportProduct\ImportProductTransaction;
use App\Decorators\Statistic\MostImported;
use App\Http\Controllers\Requests\API\ImportBill\ImportBillGetRequest;
use App\Http\Controllers\Requests\API\ImportBill\ImportBillPatchRequest;
use App\Http\Controllers\Requests\API\ImportBill\ImportBillPostRequest;

class ImportBillController extends APIController
{
    private $importStatistic;

    public function __construct(ImportProductTransaction $decorator, MostImported $importStatistic)
    {
        parent::__construct($decorator);
        $this->importStatistic = $importStatistic;
    }

    public function get(ImportBillGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(ImportBillPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(ImportBillPatchRequest $request, ?int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function getAll(ImportBillGetRequest $request)
    {
        return parent::_getAll($request);
    }

    public function getBetween(ImportBillGetRequest $request)
    {
        return parent::_getBetween($request);
    }

    public function statistic(ImportBillGetRequest $request)
    {
        $from = $request->getDayBegin();
        $to = $request->getDayTo();
        return $this->importStatistic->getBetween('created_at', $from, $to, []);
    }
}