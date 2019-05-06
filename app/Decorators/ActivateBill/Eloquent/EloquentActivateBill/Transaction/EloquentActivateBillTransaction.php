<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 9:30 PM
 */

namespace App\Decorators\ActivateBill\Eloquent\EloquentActivateBill\Transaction;


use App\Decorators\ActivateBill\ActivateBillDecorator;
use App\Decorators\ActivateBill\ActivateBillTransaction;
use App\Decorators\EloquentUpdateTransactionDecorator;

class EloquentActivateBillTransaction extends EloquentUpdateTransactionDecorator implements ActivateBillTransaction
{
    public function __construct(ActivateBillDecorator $decorator)
    {
        parent::__construct($decorator);
    }
}