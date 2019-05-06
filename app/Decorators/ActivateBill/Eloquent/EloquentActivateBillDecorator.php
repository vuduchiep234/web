<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/29/2018
 * Time: 11:34 AM
 */

namespace App\Decorators\ActivateBill\Eloquent;


use App\Decorators\ActivateBill\ActivateBillDecorator;
use App\Decorators\ActivateBill\CancelBillDecorator;
use App\Decorators\EloquentDecorator;
use App\Repositories\BillRepository;
use App\Services\BillService;
use App\Services\Eloquent\EloquentService;

/**
 * Subclass decorator for enhancing update bill.
 * Class EloquentActivateBillDecorator
 * @package App\Decorators\ActivateBill\Eloquent
 */
class EloquentActivateBillDecorator extends EloquentDecorator implements ActivateBillDecorator, CancelBillDecorator
{
    public function __construct(BillService $billService)
    {
        parent::__construct($billService);
    }

    public function updateModel(array $attributes, $id): bool
    {
        return parent::updateModel($attributes, $id);
    }
}