<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:10 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ExportBillRepository;
use App\Services\ExportBillService;

class EloquentExportBillService extends EloquentService implements ExportBillService
{
    public function __construct(ExportBillRepository $repository)
    {
        parent::__construct($repository);
    }
}