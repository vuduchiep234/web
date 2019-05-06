<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 5:16 PM
 */

namespace App\Decorators\ExportProduct\Eloquent\EloquentExportProduct;


use App\Decorators\ExportProduct\EloquentExportProductDecorator;
use App\Repositories\ExportBillRepository;
use App\Services\BillService;
use App\Services\ExportBillService;
use Illuminate\Database\Eloquent\Model;

/**
 * After create a export bill, the bill in the export bill is changed to onShipping state
 * Class OnShippingStateDecorator
 * @package App\Decorators\ExportProduct\Eloquent\EloquentExportProduct
 */
class OnShippingStateDecorator extends EloquentExportProductDecorator
{
    private $billService;
    private static $ON_SHIPPING_STATE = 'onShipping';

    public function __construct(ExportBillService $exportBillService, BillService $billService)
    {
        parent::__construct($exportBillService);
        $this->billService = $billService;
    }

    public function createNewModel(array $attributes): ?Model
    {
        $exportBill = parent::createNewModel($attributes);

        if($exportBill !== null){
            $billId = $attributes['bill_id'];

            //get the bill
            $bill = $this->billService->getModel([], $billId);
            $billAttributes = $bill->getAttributes();

            //change the bill state to onShipping
            $billAttributes['state'] = self::$ON_SHIPPING_STATE;

            //update database
            $this->billService->updateModel($billAttributes, $billId);

            return $exportBill;
        }
        return null;
    }
}