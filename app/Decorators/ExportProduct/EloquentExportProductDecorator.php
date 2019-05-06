<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 5:13 PM
 */

namespace App\Decorators\ExportProduct;


use App\Decorators\EloquentDecorator;
use App\Services\ExportBillService;

/**
 * Subclass for enhancing create and update export bills
 * Class EloquentExportProductDecorator
 * @package App\Decorators\ExportProduct
 */
class EloquentExportProductDecorator extends EloquentDecorator implements ExportProductDecorator, ConfirmExportProductDecorator
{
    public function __construct(ExportBillService $exportBillService)
    {
        parent::__construct($exportBillService);
    }
}