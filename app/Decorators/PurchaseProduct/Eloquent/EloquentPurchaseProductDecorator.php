<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/28/2018
 * Time: 1:51 PM
 */

namespace App\Decorators\PurchaseProduct\Eloquent;


use App\Decorators\EloquentDecorator;
use App\Decorators\PurchaseProduct\PurchaseProductDecorator;
use App\Services\BillDetailService;
use Illuminate\Database\Eloquent\Model;

/**
 * Subclass for enhancing purchase product
 * Class EloquentPurchaseProductDecorator
 * @package App\Decorators\PurchaseProduct\Eloquent
 */
class EloquentPurchaseProductDecorator extends EloquentDecorator implements PurchaseProductDecorator
{
    public function __construct(BillDetailService $billDetailService)
    {
        parent::__construct($billDetailService);
    }

    public function createNewModel(array $attributes): ?Model
    {
        return parent::createNewModel($attributes);
    }
}