<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/11/2018
 * Time: 1:57 PM
 */

namespace App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone;


use App\Services\BillService;
use App\Services\ExportBillService;
use App\Services\ShipperService;

/**
 * If the shipper of the bill is closed for taking ship, release him
 * Class CheckReleaseShipperDecorator
 * @package App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone
 */
class CheckReleaseShipperDecorator extends DoneStateDecorator
{
    private $shipperService;

    private static $INACTIVE_SHIPPER_STATE = false;

    public function __construct(ExportBillService $exportBillService, BillService $billService,
                                ShipperService $shipperService)
    {
        parent::__construct($exportBillService, $billService);
        $this->shipperService = $shipperService;
    }

    public function updateModel(array $attributes, $id): bool
    {
        $state = parent::updateModel($attributes, $id);
        if ($state) {
            //get the export bill
            $exportBillService = parent::getService();
            $exportBill = $exportBillService->getModel(['bill'], $id);

            //get the bill
            $bill = $exportBill['bill'];
            $shipperId = $bill->getAttribute('shipper_id');

            //get the shipper
            $shipper = $this->shipperService->getModel([], $shipperId);
            $shipperAttributes = $shipper->getAttributes();
            //get shipper state
            $shipperState = $shipperAttributes['state'];
            //check if shipper is closed for taking more ships, if true, release him
            if ($shipperState == self::$INACTIVE_SHIPPER_STATE){
                $shipperAttributes['state'] = true;
                // update database
                $state = $this->shipperService->updateModel($shipperAttributes, $shipperAttributes['id']);
            }
        }
        return $state;
    }
}