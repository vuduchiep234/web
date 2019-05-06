<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:53 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\ImportBill;
use App\Repositories\ImportBillRepository;

class EloquentImportBillRepository extends EloquentRepository implements ImportBillRepository
{
    public function __construct()
    {
        parent::__construct(ImportBill::query());
    }
}