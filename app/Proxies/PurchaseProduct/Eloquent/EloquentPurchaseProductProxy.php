<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 8:31 PM
 */

namespace App\Proxies\PurchaseProduct\Eloquent;


use App\Decorators\PurchaseProduct\PurchaseProductTransaction;
use App\Proxies\EloquentProxy;
use App\Proxies\PurchaseProduct\PurchaseProductProxy;
use App\Services\ProductService;

class EloquentPurchaseProductProxy extends EloquentProxy implements PurchaseProductProxy
{
    private $productService;

    public function __construct(PurchaseProductTransaction $decorator, ProductService $productService)
    {
        parent::__construct($decorator);
        $this->productService = $productService;
    }

    function checkUpdate(array $attributes, $id): bool
    {
        return true;
    }

    /**
     * Control access to purchase service
     * @param array $attributes
     * @return bool
     */
    function checkCreate(array $attributes): bool
    {
        //get the request product quantity
        $expectedQuantity = $attributes['quantity'];
        $productId = $attributes['product_id'];
        $product = $this->productService->getModel(['inventory'], $productId);

        //get the product quantity in inventory
        $inventory = $product['inventory'];
        $inventoryQuantity = $inventory['quantity'];
        //check if we can handle the purchasing activity
        if ($expectedQuantity <= $inventoryQuantity){
            return true;
        }
        return false;
    }
}