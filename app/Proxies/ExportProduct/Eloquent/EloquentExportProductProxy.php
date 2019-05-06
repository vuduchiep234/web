<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/3/2018
 * Time: 2:04 AM
 */

namespace App\Proxies\ExportProduct\Eloquent;

use App\Decorators\ExportProduct\ExportProductTransaction;
use App\Proxies\EloquentProxy;
use App\Proxies\ExportProduct\ExportProductProxy;
use App\Services\BillService;

class EloquentExportProductProxy extends EloquentProxy implements ExportProductProxy
{
    private $billService;
    private static $ACTIVATED_STATE = 'activated';

    public function __construct(ExportProductTransaction $decorator, BillService $billService)
    {
        parent::__construct($decorator);
        $this->billService = $billService;
    }

    function checkUpdate(array $attributes, $id): bool
    {
       return true;
    }

    function checkCreate(array $attributes): bool
    {
        $billId = $attributes['bill_id'];
        $bill = $this->billService->getModel([], $billId);

        $billState = $bill->getAttribute('state');
        if(strcasecmp($billState, self::$ACTIVATED_STATE) == 0){
            return true;
        }
        return false;
    }
}