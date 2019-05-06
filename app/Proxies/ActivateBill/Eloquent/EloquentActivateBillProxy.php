<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 12:25 PM
 */

namespace App\Proxies\ActivateBill\Eloquent;


use App\Decorators\ActivateBill\ActivateBillTransaction;
use App\Proxies\ActivateBill\ActivateBillProxy;
use App\Services\BillService;
use App\Services\ShipperService;

class EloquentActivateBillProxy extends CheckBillState implements ActivateBillProxy
{
    private static $ACTIVATED_STATE = 'activated';
    private static $ACTIVE_SHIPPER_STATE = true;
    private $shipperService;

    public function __construct(ActivateBillTransaction $decorator, BillService $billService,
                                ShipperService $shipperService)
    {
        parent::__construct($decorator, $billService);
        $this->shipperService = $shipperService;
    }

    /**
     * Control access to the activate bill service
     * @param array $attributes
     * @param $id
     * @return bool
     */
    function checkUpdate(array $attributes, $id): bool
    {
        if(parent::checkUpdate($attributes, $id)){
            if(array_key_exists('shipper_id', $attributes)){
                //check if the shipper is free
                $shipper = $this->shipperService->getModel([], $attributes['shipper_id']);
                $shipperState = $shipper->getAttribute('state');
                if ($shipperState == self::$ACTIVE_SHIPPER_STATE){
                    //check if the request is valid
                    if (strcasecmp($attributes['state'], self::$ACTIVATED_STATE) == 0){
                        return true;
                    }
                }
            }
        }
        return false;
    }
}