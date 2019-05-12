<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:47 PM
 */

namespace App\Handlers\ProductHandlers;


use App\Handlers\HandlerResponse\HandlerResponse;

class GetProductHandler extends EloquentProductHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('product_id', $attributes)) {
            return $this->createHandlerResponse('Missing product_id', false);
        }
        $productService = $this->createHandlerService();
        $product = $productService->getModel([], $attributes['product_id']);

        if ($product == null) {
            return $this->createHandlerResponse('Product not found', false);
        } else {
            $attributes['product'] = $product;
            return parent::handle($attributes);
        }


    }
}