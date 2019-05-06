<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 12:08 AM
 */

namespace App\Decorators\PurchaseProduct\Eloquent;

use App\Repositories\BillDetailRepository;
use App\Services\BillDetailService;
use App\Services\InventoryService;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * After create bill, subtract the product quantity
 * Class SubtractQuantityDecorator
 * @package App\Decorators\PurchaseProduct\Eloquent
 */
class SubtractQuantityDecorator extends EloquentPurchaseProductDecorator
{
    private $productService;
    private $inventoryService;

    public function __construct(BillDetailService $billDetailService,ProductService $productService,
                                InventoryService $inventoryService)
    {
        parent::__construct($billDetailService);
        $this->productService = $productService;
        $this->inventoryService = $inventoryService;
    }

    /**
     * Subtract the product quantity
     * @param array $attributes
     * @return Model|null
     */
    public function createNewModel(array $attributes): ?Model
    {
        $billDetail = parent::createNewModel($attributes);
        if($billDetail !== null){
            //get the product
            $productId = $billDetail->getAttribute('product_id');
            $subtraction = $billDetail->getAttribute('quantity');

            $product = $this->productService->getModel(['inventory'], $productId);

            //get the inventory
            $inventory = $product['inventory'];
            $inventoryAttributes = $inventory->getAttributes();
            //get the quantity in inventory
            $inventoryQuantity = $inventoryAttributes['quantity'];
            //subtract the product quantity
            $inventoryAttributes['quantity'] = $inventoryQuantity - $subtraction;

            //update database
            $update = $this->inventoryService->updateModel($inventoryAttributes, $inventoryAttributes['id']);
            if ($update){
                return $billDetail;
            }
        }
        return null;
    }
}