<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:50 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Bill;
use App\Repositories\BillRepository;

class EloquentBillRepository extends EloquentRepository implements BillRepository
{
    public function __construct()
    {
        parent::__construct(Bill::query());
    }
}