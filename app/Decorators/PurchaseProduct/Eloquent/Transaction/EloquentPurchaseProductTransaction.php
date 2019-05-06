<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 8:06 PM
 */

namespace App\Decorators\PurchaseProduct\Eloquent\Transaction;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Decorators\PurchaseProduct\PurchaseProductDecorator;
use App\Decorators\PurchaseProduct\PurchaseProductTransaction;


class EloquentPurchaseProductTransaction extends EloquentCreateTransactionDecorator implements PurchaseProductTransaction
{
    public function __construct(PurchaseProductDecorator $decorator)
    {
        parent::__construct($decorator);
    }

}