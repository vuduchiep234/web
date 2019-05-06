<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 11:37 AM
 */

namespace App\Decorators\ActivateBill\Eloquent\EloquentCancelBill;


use App\Decorators\ActivateBill\Eloquent\EloquentActivateBillDecorator;
use App\Repositories\BillRepository;
use App\Services\BillDetailService;
use App\Services\BillService;
use App\Services\InventoryService;
use App\Services\ProductService;

/**
 * If the bill was not activated, return the product to its inventory.
 * Class ReturnProductsDecorator
 * @package App\Decorators\ActivateBill\Eloquent\EloquentCancelBill
 */
class ReturnProductsDecorator extends EloquentActivateBillDecorator
{
    private $productService;
    private $inventoryService;

    public function __construct(BillService $billService, ProductService $productService,
                                InventoryService $inventoryService)
    {
        parent::__construct($billService);
        $this->productService = $productService;
        $this->inventoryService = $inventoryService;
    }

    /**
     * Return product to its inventory
     * @param array $attributes
     * @param $id
     * @return bool
     */
    public function updateModel(array $attributes, $id): bool
    {
        $state = parent::updateModel($attributes, $id);

        if($state){
            //get the bill object
            $billId = $id;
            $bill = $this->service->getModel(['billDetail'], $billId);

            //get the billDetail object and its return quantity
            $billDetail = $bill['billDetail'];
            $returnQuantity = $billDetail['quantity'];

            //get the remain product quantity
            $productId = $billDetail['product_id'];
            $product = $this->productService->getModel(['inventory'], $productId);

            $inventory = $product['inventory'];
            $inventoryAttributes = $inventory->getAttributes();

            //return the cancelled bill's product to its inventory.
            $inventoryQuantity = $inventoryAttributes['quantity'];
            $inventoryAttributes['quantity'] = $inventoryQuantity + $returnQuantity;

            // update database.
            $this->inventoryService->updateModel($inventoryAttributes, $inventoryAttributes['id']);

            return $state;
        }
        return false;
    }
}