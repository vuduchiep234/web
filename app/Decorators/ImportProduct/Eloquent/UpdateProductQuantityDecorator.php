<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/27/2018
 * Time: 12:46 AM
 */

namespace App\Decorators\ImportProduct\Eloquent;

use App\Repositories\ImportBillRepository;
use App\Services\ImportBillService;
use App\Services\InventoryService;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * After create a import bill, add quantity of the imported product to its inventory
 * Class UpdateProductQuantityDecorator
 * @package App\Decorators\ImportProduct\Eloquent
 */
class UpdateProductQuantityDecorator extends EloquentImportProductDecorator
{
    private $inventoryService;
    private $productService;

    public function __construct(ImportBillService $billService,
                                ProductService $productService, InventoryService $inventoryService)
    {
        parent::__construct($billService);
        $this->inventoryService = $inventoryService;
        $this->productService = $productService;
    }

    public function createNewModel(array $attributes): ?Model
    {
        $importBill = parent::createNewModel($attributes);
        if($importBill !== null){
            // get the imported product
            $productId = $importBill->getAttribute('product_id');
            $addition = $importBill->getAttribute('quantity');

            $product = $this->productService->getModel(['inventory'], $productId);

            //get product's inventory
            $inventory = $product['inventory'];
            $inventoryAttributes = $inventory->getAttributes();
            $inventoryQuantity = $inventoryAttributes['quantity'];
            //add the import quantity to the inventory
            $inventoryAttributes['quantity'] = $inventoryQuantity + $addition;

            //update database
            $this->inventoryService->updateModel($inventoryAttributes, $inventoryAttributes['id']);
            return $importBill;
        }
        return null;
    }
}