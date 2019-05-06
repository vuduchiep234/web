<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/10/2018
 * Time: 1:48 AM
 */

namespace App\Decorators\ActivateBill\Eloquent\EloquentActivateBill;


use App\Decorators\ActivateBill\Eloquent\EloquentActivateBillDecorator;
use App\Models\Bill;
use App\Services\BillService;
use App\Services\ShipperService;

/**
 * After create bill, check if the shipper that was assigned to that bill is on the limit of not.
 * If true, close the ability of taking more ships.
 * Class ValidateShipperDecorator
 * @package App\Decorators\ActivateBill\Eloquent\EloquentActivateBill
 */
class ValidateShipperDecorator extends EloquentActivateBillDecorator
{
    private $shipperService;

    private static $MAX_SHIP_NUMBER = 2;
    private static $SHIPPING_STATE = ['onShipping', 'activated'];

    public function __construct(BillService $billService, ShipperService $shipperService)
    {
        parent::__construct($billService);
        $this->shipperService = $shipperService;

    }

    public function updateModel(array $attributes, $id): bool
    {
        $state = parent::updateModel($attributes, $id);

        if ($state) {
            $shipper = $this->shipperService->getModel(['bills'], $attributes['shipper_id']);
            $bills = $shipper['bills']->toArray();

            /**
             * If shipper has enough shipping bills, shut down shipper's ability of taking more ships.
             */
            if (count($this->countActivatedBill($bills)) == (self::$MAX_SHIP_NUMBER)) {
                $shipperAttributes = $shipper->getAttributes();
                $shipperAttributes['state'] = false;
                $this->shipperService->updateModel($shipperAttributes, $shipperAttributes['id']);
            }

        }
        return $state;
    }

    /**
     * Count existing bills of shipper
     * @param array $bills
     * @return array
     */
    private function countActivatedBill(array $bills): array
    {
        $activatedBills = [];
        foreach ($bills as $bill){
            /**
             * @var Bill $bill;
             */
            $billState = $bill['state'];
            if (in_array($billState, self::$SHIPPING_STATE)){
                array_push($activatedBills, $bill);
            }
        }
        return $activatedBills;
    }
}