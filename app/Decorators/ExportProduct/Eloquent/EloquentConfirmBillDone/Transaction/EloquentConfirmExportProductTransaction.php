<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 11:22 PM
 */

namespace App\Decorators\ExportProduct\Eloquent\EloquentConfirmBillDone\Transaction;


use App\Decorators\EloquentUpdateTransactionDecorator;
use App\Decorators\ExportProduct\ConfirmExportProductDecorator;
use App\Decorators\ExportProduct\ConfirmExportProductTransaction;

class EloquentConfirmExportProductTransaction extends EloquentUpdateTransactionDecorator implements ConfirmExportProductTransaction
{
    public function __construct(ConfirmExportProductDecorator $decorator)
    {
        parent::__construct($decorator);
    }
}