<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:06 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BillDetailRepository;
use App\Services\BillDetailService;

class EloquentBillDetailService extends EloquentService implements BillDetailService
{
    public function __construct(BillDetailRepository $repository)
    {
        parent::__construct($repository);
    }
}