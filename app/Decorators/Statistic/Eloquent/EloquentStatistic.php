<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/13/2018
 * Time: 10:44 AM
 */

namespace App\Decorators\Statistic\Eloquent;


use App\Decorators\EloquentDecorator;

abstract class EloquentStatistic extends EloquentDecorator
{
    /**
     * Enhance the getBetween by statistic the return information
     * @param $needle
     * The search column
     * @param $from
     * The begin value of search
     * @param $to
     * The end value of search
     * @param array $relations
     * The relations that are attached with the return information
     * @return mixed
     */
    public function getBetween($needle, $from, $to, array $relations = [])
    {
        $models = parent::getBetween($needle, $from, $to, $relations);
        return $this->statistic($models);
    }

    abstract function statistic($models);
}