<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/9/2018
 * Time: 12:40 AM
 */

namespace App\Proxies\ActivateBill\Eloquent;


use App\Proxies\EloquentProxy;
use App\Services\BillService;
use App\Services\Service;

class CheckBillState extends EloquentProxy
{
    private $billService;
    private static $UNACTIVATED_STATE = 'unactivated';

    public function __construct(Service $decorator, BillService $billService)
    {
        parent::__construct($decorator);
        $this->billService = $billService;
    }

    /**
     * Check the bill that we mean to activate is valid of not (Only activate the unactivated bill)
     * @param array $attributes
     * @param $id
     * @return bool
     */
    function checkUpdate(array $attributes, $id): bool
    {
        $bill = $this->billService->getModel([], $id);
        $billState = $bill->getAttribute('state');
        if(strcasecmp($billState, self::$UNACTIVATED_STATE) == 0){
            return true;
        }
        return false;
    }

    function checkCreate(array $attributes): bool
    {
        return true;
    }
}