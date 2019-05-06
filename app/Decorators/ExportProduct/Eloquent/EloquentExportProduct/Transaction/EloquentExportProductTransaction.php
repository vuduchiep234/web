<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 11:25 PM
 */

namespace App\Decorators\ExportProduct\Eloquent\EloquentExportProduct\Transaction;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Decorators\ExportProduct\ExportProductDecorator;
use App\Decorators\ExportProduct\ExportProductTransaction;

class EloquentExportProductTransaction extends EloquentCreateTransactionDecorator implements ExportProductTransaction
{
    public function __construct(ExportProductDecorator $decorator)
    {
        parent::__construct($decorator);
    }
}