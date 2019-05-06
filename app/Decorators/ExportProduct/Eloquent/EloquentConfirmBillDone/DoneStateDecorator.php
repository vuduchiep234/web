<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/30/2018
 * Time: 10:07 AM
 */

namespace App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone;


use App\Decorators\ExportProduct\EloquentExportProductDecorator;
use App\Repositories\ExportBillRepository;
use App\Services\BillService;
use App\Services\ExportBillService;

/**
 * After confirm that the product has been delivered to the buyer, update bill state in export bill to done
 * Class DoneStateDecorator
 * @package App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone
 */
class DoneStateDecorator extends EloquentExportProductDecorator
{
    private $billService;
    private static $DONE_STATE = 'done';

    public function __construct(ExportBillService $exportBillService, BillService $billService)
    {
        parent::__construct($exportBillService);
        $this->billService = $billService;
    }

    public function updateModel(array $attributes, $id): bool
    {
        $exportBillUpdate = parent::updateModel($attributes, $id);

        $exportBillId = $id;
        if($exportBillUpdate){
            //get the export bill
            $exportBill = $this->service->getModel(['bill'], $exportBillId);
            //get the bill
            $bill = $exportBill['bill'];

            //get bill the attributes
            $billAttributes = $bill->getAttributes();
            //change bill state to done.
            $billAttributes['state'] = self::$DONE_STATE;

            //update database
            $billUpdate = $this->billService->updateModel($billAttributes, $billAttributes['id']);
            return $billUpdate;
        }
        return false;
    }

    public function getBillService(): BillService
    {
        return $this->billService;
    }
}