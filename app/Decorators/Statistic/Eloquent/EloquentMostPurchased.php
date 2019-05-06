<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/13/2018
 * Time: 9:53 AM
 */

namespace App\Decorators\Statistic\Eloquent;


use App\Decorators\EloquentDecorator;
use App\Decorators\Statistic\MostPurchased;
use App\Services\BillService;
use App\Services\ExportBillService;
use App\Services\ProductService;


class EloquentMostPurchased extends EloquentStatistic implements MostPurchased
{
    private $productService;
    private $billService;

    private static $DONE_STATE = 'done';

    public function __construct(ExportBillService $service, ProductService $productService, BillService $billService)
    {
        parent::__construct($service);
        $this->billService = $billService;
        $this->productService = $productService;
    }

    private function getExportInformation($models)
    {
        $products = [];
        $exportedQuantity = [];
        foreach ($models as $model) {
            //get the bill
            $billId = $model['bill_id'];
            $bill = $this->billService->getModel(['billDetail'], $billId);
            //get the bill state
            $billState = $bill->getAttribute('state');
            //if the bill is in the right state, count its information
            if ($this->checkState($billState)){
                //get the bill detail
                $billDetail = $bill['billDetail'];
                $productId = $billDetail->getAttribute('product_id');
                //if the product is new to the iterator, create a new array for storing its information
                //else, add the information to the existing one.
                if (!in_array($productId, $products)) {
                    array_push($products, $productId);
                    $product = $this->productService->getModel(['producer', 'category'], $productId);
                    $information = [
                        'product' => $product,
                        'quantity' => $billDetail['quantity'],
                        'price' => $billDetail['price']
                    ];
                    $exportedQuantity[$productId] = $information;
                } else {
                    $exportedQuantity[$productId]['quantity'] += $billDetail['quantity'];
                    $exportedQuantity[$productId]['price'] += $billDetail['price'];
                }
            }
        }
        return $exportedQuantity;
    }

    /**
     * Check if the state of the bill is equal to the Done state
     * @param string $state
     * @return bool
     */
    private function checkState(string $state)
    {
        if (strcasecmp($state, self::$DONE_STATE) == 0){
            return true;
        }
        return false;
    }

    function statistic($models)
    {
        return $this->getExportInformation($models);
    }
}