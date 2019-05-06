<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 12:40 PM
 */

namespace App\Proxies\ActivateBill\Eloquent;


use App\Decorators\ActivateBill\CancelBillTransaction;
use App\Proxies\ActivateBill\CancelBillProxy;
use App\Services\BillService;

class EloquentCancelBillProxy extends CheckBillState implements CancelBillProxy
{
    private static $CANCELLED_STATE = 'cancelled';

    public function __construct(CancelBillTransaction $decorator, BillService $billService)
    {
        parent::__construct($decorator, $billService);
    }

    /**
     * Control access to the cancel bill service
     * @param array $attributes
     * @param $id
     * @return bool
     */
    function checkUpdate(array $attributes, $id): bool
    {
        if(parent::checkUpdate($attributes, $id)){
            if (strcasecmp($attributes['state'], self::$CANCELLED_STATE) == 0){
                return true;
            }
        }
        return false;
    }
}