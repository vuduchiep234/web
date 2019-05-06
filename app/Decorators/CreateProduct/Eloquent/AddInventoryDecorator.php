<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/27/2018
 * Time: 9:45 PM
 */

namespace App\Decorators\CreateProduct\Eloquent;


use App\Repositories\ProductRepository;
use App\Services\InventoryService;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * Add an inventory after create product
 * Class AddInventoryDecorator
 * @package App\Decorators\CreateProduct\Eloquent
 */
class AddInventoryDecorator extends EloquentCreateProductDecorator
{
    private $inventoryService;

    public function __construct(ProductService $productService, InventoryService $inventoryService)
    {
        parent::__construct($productService);
        $this->inventoryService = $inventoryService;
    }

    /**
     * Create an inventory for product
     * @param array $attributes
     * @return Model|null
     */
    public function createNewModel(array $attributes): ?Model
    {
        $product = parent::createNewModel($attributes);

        if($product !== null){
            $inventoryAttributes['product_id'] = $product->getAttribute('id');
            $inventoryAttributes['quantity'] = 0;

            //create new inventory
            $this->inventoryService->createNewModel($inventoryAttributes);
            return $product;
        }
        return null;
    }
}