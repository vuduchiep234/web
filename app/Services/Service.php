<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 5:57 PM
 */

namespace App\Services;


use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function createNewModel(array $attributes): ?Model;

    public function updateModel(array $attributes, $id): bool;

    public function deleteModel($id ): bool;

    public function getModel(array $attributes, $id): ?Model;

    public function count(): int;

    public function getRepository(): Repository;

    public function getAll(array $relation = []);

    public function getBetween($needle, $from, $to, array $relations = []);

    public function getBy(array $needles, array $values, array  $relations = []);
}