<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:11 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ImportBillRepository;
use App\Services\ImportBillService;

class EloquentImportBillService extends EloquentService implements ImportBillService
{
    public function __construct(ImportBillRepository $repository)
    {
        parent::__construct($repository);
    }
}