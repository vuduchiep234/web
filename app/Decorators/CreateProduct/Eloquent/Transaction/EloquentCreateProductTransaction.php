<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 8:11 PM
 */

namespace App\Decorators\CreateProduct\Eloquent\Transaction;


use App\Decorators\CreateProduct\CreateProductDecorator;
use App\Decorators\CreateProduct\CreateProductTransaction;
use App\Decorators\EloquentCreateTransactionDecorator;
use Illuminate\Database\Eloquent\Model;

class EloquentCreateProductTransaction extends EloquentCreateTransactionDecorator implements CreateProductTransaction
{
    public function __construct(CreateProductDecorator $decorator)
    {
        parent::__construct($decorator);
    }

    public function createNewModel(array $attributes): ?Model
    {
        return parent::createNewModel($attributes);
    }
}