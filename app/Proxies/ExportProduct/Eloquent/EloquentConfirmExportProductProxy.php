<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/3/2018
 * Time: 2:17 AM
 */

namespace App\Proxies\ExportProduct\Eloquent;

use App\Decorators\ExportProduct\ConfirmExportProductTransaction;
use App\Proxies\EloquentProxy;
use App\Proxies\ExportProduct\ConfirmExportProductProxy;
use App\Services\ExportBillService;

class EloquentConfirmExportProductProxy extends EloquentProxy implements ConfirmExportProductProxy
{
    private $exportBillService;
    private static $ON_SHIPPING_STATE = 'onShipping';

    public function __construct(ConfirmExportProductTransaction $decorator, ExportBillService $exportBillService)
    {
        parent::__construct($decorator);
        $this->exportBillService = $exportBillService;
    }

    function checkUpdate(array $attributes, $id): bool
    {
        $exportBillId = $id ? $id : $attributes['id'];
        $exportBill = $this->exportBillService->getModel(['bill'], $exportBillId);

        $bill = $exportBill['bill'];
        $billState = $bill['state'];

        if(strcasecmp($billState, self::$ON_SHIPPING_STATE) == 0){
            return true;
        }
        return false;
    }

    function checkCreate(array $attributes): bool
    {
        return true;
    }
}