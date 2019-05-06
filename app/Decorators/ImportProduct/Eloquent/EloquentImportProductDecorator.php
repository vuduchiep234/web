<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/27/2018
 * Time: 12:38 AM
 */

namespace App\Decorators\ImportProduct\Eloquent;


use App\Decorators\EloquentDecorator;
use App\Decorators\ImportProduct\ImportProductDecorator;
use App\Services\ImportBillService;
use Illuminate\Database\Eloquent\Model;

/**
 * Subclass for enhancing creation import bill
 * Class EloquentImportProductDecorator
 * @package App\Decorators\ImportProduct\Eloquent
 */
class EloquentImportProductDecorator extends EloquentDecorator implements ImportProductDecorator
{
    public function __construct(ImportBillService $importBillService)
    {
        parent::__construct($importBillService);
    }

    public function createNewModel(array $attributes): ?Model
    {
        return parent::createNewModel($attributes);
    }
}