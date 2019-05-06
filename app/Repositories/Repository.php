<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 5:57 PM
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function get(int $id, array $relation = []) :?Model;

    public function create(array $attributes): ?Model;

    public function update(array $attributes, Model $model): bool;

    public function delete(int $id): bool;

    public function count() :int;

    public function syncModel(array $attributes, $relation,  Model $model);

    public function find(int $id);

    public function getAll(array $relation = []);

    public function getQuery(): Builder;

    public function getBetween($needle, $from, $to, array $relations = []);

    public function getBy(array $conditions, array $relations = []);
}