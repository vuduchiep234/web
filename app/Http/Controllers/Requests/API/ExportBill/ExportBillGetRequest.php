<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:56 PM
 */

namespace App\Http\Controllers\Requests\API\ExportBill;


use App\Http\Controllers\Requests\API\GetRequest;
use Illuminate\Support\Facades\Input;

class ExportBillGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['creator', 'bill'];
    }

    protected function sort(): array
    {
        return ['id', 'creator_id', 'bill_id', 'day_created'];
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