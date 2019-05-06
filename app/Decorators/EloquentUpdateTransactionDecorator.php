<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/8/2018
 * Time: 11:32 AM
 */

namespace App\Decorators;


use Illuminate\Support\Facades\DB;

/**
 * Subclasses of EloquentDecorator
 * Class EloquentUpdateTransactionDecorator
 * @package App\Decorators
 */
class EloquentUpdateTransactionDecorator extends EloquentDecorator
{
    /**
     * Enhances the updateModel method by add the transaction (rolls back if has fault during database handle
     * activities).
     * @param array $attributes
     * @param $id
     * @return bool
     */
    public function updateModel(array $attributes, $id): bool
    {
        $state = null;
        DB::transaction(function () use ($attributes, $id, &$state) {
            $state = parent::updateModel($attributes, $id);
        });
        return $state;
    }
}