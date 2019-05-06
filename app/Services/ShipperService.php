<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:02 PM
 */

namespace App\Services;


use Illuminate\Database\Eloquent\Model;

interface ShipperService extends Service
{
    public function findRandomShipper(): ?Model;
}