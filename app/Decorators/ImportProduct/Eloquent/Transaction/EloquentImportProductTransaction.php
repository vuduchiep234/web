<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 8:21 PM
 */

namespace App\Decorators\ImportProduct\Eloquent\Transaction;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Decorators\ImportProduct\ImportProductDecorator;
use App\Decorators\ImportProduct\ImportProductTransaction;

class EloquentImportProductTransaction extends EloquentCreateTransactionDecorator implements ImportProductTransaction
{
    public function __construct(ImportProductDecorator $decorator)
    {
        parent::__construct($decorator);
    }


}