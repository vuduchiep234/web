<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 3:47 PM
 */

namespace App\Handlers\ProductHandlers;


use App\Handlers\HandlerResponse\HandlerResponse;
use DateTime;

class CheckProductTimeHandler extends EloquentProductHandler
{
    private static $ALLOWED_MINUTES = 30;
    private static $ALLOWED_DAY = 0;

    private static $INVALID_AUCTION = 'Time over';
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('product_id', $attributes)) {
            return $this->createHandlerResponse('Missing product_id', false);
        }
        $productService = $this->createHandlerService();
        $product = $productService->getModel([], $attributes['product_id']);

        $createTime = $product['created_at'];
        $currentTime = date('Y-m-d h:i:s', time());

        try {
            $date1 = new DateTime($currentTime);
            $date2 = new DateTime($createTime);
        } catch (\Exception $e) {
            return $this->createHandlerResponse($e->getMessage(), false);
        }
        $diff = $date1->diff($date2);

        if (($diff->d == 0) && ($diff->m == 0) && ($diff->y == 0) && ($diff->h == 0)) {
            if (($diff->m <= self::$ALLOWED_MINUTES)) {
                return parent::handle($attributes);
            }
        }
        return $this->createHandlerResponse(self::$INVALID_AUCTION, false);

    }
}