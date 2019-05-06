<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/13/2018
 * Time: 12:28 AM
 */

namespace App\Decorators\Statistic\Eloquent;


use App\Decorators\Statistic\MostImported;
use App\Services\ImportBillService;
use App\Services\ProductService;

class EloquentMostImported extends EloquentStatistic implements MostImported
{
    private $productService;
    
    public function __construct(ImportBillService $service, ProductService $productService)
    {
        parent::__construct($service);
        $this->productService = $productService;
    }

    /**
     * Get information about import product
     * @param $models
     * A Collection of import bill
     * @return array
     *
     */
    private function getImportInformation($models)
    {
        $products = [];
        $importedQuantity = [];
        foreach ($models as $model) {
            //get product id
            $productId = $model['product_id'];
            //if product is new, create a array for storing import information,
            //else (the product is counted before) add information to the existing one
            if (!in_array($productId, $products)) {
                array_push($products, $productId);
                $product = $this->productService->getModel(['producer', 'category'], $productId);
                $information = [
                    'product' => $product,
                    'quantity' => $model['quantity'],
                    'price' => $model['price']
                ];
                $importedQuantity[$productId] = $information;
            } else {
                //add the import quantity to the existing store
                $importedQuantity[$productId]['quantity'] += $model['quantity'];
                $importedQuantity[$productId]['price'] += $model['price'];
            }
        }

        return $importedQuantity;
    }

    function statistic($models)
    {
        return $this->getImportInformation($models);
    }
}