<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 9:26 PM
 */

namespace App\Decorators\ActivateBill\Eloquent\EloquentCancelBill\Transaction;


use App\Decorators\ActivateBill\CancelBillDecorator;
use App\Decorators\ActivateBill\CancelBillTransaction;
use App\Decorators\EloquentUpdateTransactionDecorator;

class EloquentCancelBillTransaction extends EloquentUpdateTransactionDecorator implements CancelBillTransaction
{
    public function __construct(CancelBillDecorator $decorator)
    {
        parent::__construct($decorator);
    }
}