<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 12:29 AM
 */

namespace App\Decorators\PurchaseProduct\Eloquent;


use App\Repositories\BillDetailRepository;
use App\Services\BillDetailService;
use App\Services\BillService;
use App\Services\InventoryService;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * After make a billDetail, make a bill and link it to the billDetail
 * Class MakeBillDecorator
 * @package App\Decorators\PurchaseProduct\Eloquent
 */
class MakeBillDecorator extends SubtractQuantityDecorator
{
    private $billService;
    public function __construct(BillDetailService $billDetailService, ProductService $productService,
                                InventoryService $inventoryService, BillService $billService)
    {
        parent::__construct($billDetailService, $productService, $inventoryService);
        $this->billService = $billService;
    }

    public function createNewModel(array $attributes): ?Model
    {
        $billDetail = parent::createNewModel($attributes);
        if ($billDetail !== null){
            $billAttributes['billdetail_id'] = $billDetail->getAttribute('id');
            $billAttributes['user_id'] = $attributes['user_id'];
            //the created bill's state is unactivated waiting for activate
            $billAttributes['state'] = 'unactivated';
            //have no shipper yet
            $billAttributes['shipper_id'] = null;

            $this->billService->createNewModel($billAttributes);
            return $billDetail;
        }
        return null;
    }
}