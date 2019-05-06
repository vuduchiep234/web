<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:44 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface ShipperRepository extends Repository
{
    public function random(): ?Model;
}