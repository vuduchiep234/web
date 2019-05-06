<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/20/2018
 * Time: 1:58 PM
 */

namespace App\Http\Controllers\API;

use App\Decorators\Statistic\MostPurchased;
use App\Http\Controllers\Requests\API\ExportBill\ExportBillGetRequest;
use App\Http\Controllers\Requests\API\ExportBill\ExportBillPatchRequest;
use App\Http\Controllers\Requests\API\ExportBill\ExportBillPostRequest;
use App\Proxies\ExportProduct\ConfirmExportProductProxy;
use App\Proxies\ExportProduct\ExportProductProxy;

class ExportBillController extends APIController
{
    private $productExporter;
    private $exportConfirmation;

    private $exportStatistic;

    public function __construct(ExportProductProxy $productExporter, ConfirmExportProductProxy $exportConfirmation,
                                MostPurchased $exportStatistic)
    {
        parent::__construct($productExporter);
        $this->exportConfirmation = $exportConfirmation;
        $this->productExporter = $productExporter;
        $this->exportStatistic = $exportStatistic;
    }

    public function get(ExportBillGetRequest $request, ?int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(ExportBillPostRequest $request)
    {
        $this->service = $this->productExporter;
        return parent::_post($request);
    }

    public function patch(ExportBillPatchRequest $request, ?int $id = null)
    {
        $this->service = $this->exportConfirmation;
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }

    public function confirm(ExportBillPatchRequest $request, ?int $id = null)
    {
        $this->service = $this->exportConfirmation;
        return parent::_patch($request, $id);
    }

    public function getAll(ExportBillGetRequest $request)
    {
        return parent::_getAll($request);
    }

    public function getBetween(ExportBillGetRequest $request)
    {
        return parent::_getBetween($request);
    }

    public function statistic(ExportBillGetRequest $request)
    {
        $from = $request->getDayBegin();
        $to = $request->getDayTo();
        return $this->exportStatistic->getBetween('created_at', $from, $to, []);
    }
}