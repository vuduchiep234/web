<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:08 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BillRepository;
use App\Services\BillService;

class EloquentBillService extends EloquentService implements BillService
{
    public function __construct(BillRepository $repository)
    {
        parent::__construct($repository);
    }
}