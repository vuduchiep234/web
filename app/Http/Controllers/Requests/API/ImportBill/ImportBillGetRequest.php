<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 9:18 PM
 */

namespace App\Http\Controllers\Requests\API\ImportBill;


use App\Http\Controllers\Requests\API\GetRequest;
use Illuminate\Support\Facades\Input;

class ImportBillGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['creator', 'product'];
    }

    protected function sort(): array
    {
        return ['id', 'creator_id', 'product_id', 'day_created', 'quantity', 'price'];
    }

    protected function filterRules(): array
    {
        return ['from' => 'string|date', 'to' => 'string|date|after:from'];
    }

    public function getDayBegin(): string
    {
        return Input::get('from')? :
            date('Y-m-d', mktime(0,0,0, 11, 01, 2018));
    }

    public function getDayTo(): string
    {
        return Input::get('to')? : date('Y-m-d', time());
    }

    public function getFilterRules(): array
    {
        $filter['from'] = $this->getDayBegin();
        $filter['to'] = $this->getDayTo();

        return $filter;
    }
}