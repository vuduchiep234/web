<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:52 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\ExportBill;
use App\Repositories\ExportBillRepository;

class EloquentExportBillRepository extends EloquentRepository implements ExportBillRepository
{
    public function __construct()
    {
        parent::__construct(ExportBill::query());
    }
}