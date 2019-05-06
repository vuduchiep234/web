<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:00 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements Repository
{

    protected $manyToManyRelations = [];

    private $queryBuilder;

    public function __construct(Builder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function get(int $id, array $relation = []): ?Model
    {
        return $this->newQuery()->with($relation)->find($id);
    }

    public function count(): int
    {
        return $this->newQuery()->count();
    }

    public function find(int $id): ?Model
    {
        return $this->newQuery()->findOrFail($id);
    }

    public function create(array $attributes): ?Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(array $attributes, Model $model): bool
    {
        return $model->update($attributes, []);
    }

    public function delete(int $id): bool
    {
        return $this->newQuery()->getModel()::destroy($id);
    }

    public function syncModel(array $attributes, $relation,  Model $model)
    {
        $model->$relation()->sync($attributes[$relation]);
    }

    public function newQuery(){
        return clone $this->queryBuilder;
    }
    public function getQuery(): Builder
    {
        return $this->queryBuilder;
    }

    public function getAll(array $relation = [])
    {
        return $this->getQuery()->with($relation)->get();
    }

    public function getBetween($needle, $from, $to,  array $relations = [])
    {
        return $this->getQuery()->whereBetween($needle, [$from, $to])->with($relations)->get();
    }

    public function getBy(array $conditions, array $relations = [])
    {
        return $this->getQuery()->where($conditions)->with($relations)->first();
    }
}