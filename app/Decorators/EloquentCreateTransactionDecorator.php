<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/8/2018
 * Time: 11:30 AM
 */

namespace App\Decorators;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Subclasses of EloquentDecorator
 * Class EloquentCreateTransactionDecorator
 * @package App\Decorators
 */
class EloquentCreateTransactionDecorator extends EloquentDecorator
{
    /**
     * Enhances the createNewModel method by add the transaction (rolls back if has fault during database handle
     * activities).
     * @param array $attributes
     * @return Model|null
     */
    public function createNewModel(array $attributes): ?Model
    {
        $model = null;
        DB::transaction(function () use ($attributes, &$model) {
            $model = parent::createNewModel($attributes);
        });
        return $model;
    }
}