<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:49 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\BillDetail;
use App\Repositories\BillDetailRepository;

class EloquentBillDetailRepository extends EloquentRepository implements BillDetailRepository
{
    public function __construct()
    {
        parent::__construct(BillDetail::query());
    }
}