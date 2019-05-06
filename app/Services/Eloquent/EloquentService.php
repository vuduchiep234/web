<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:07 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\Repository;
use App\Services\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EloquentService implements Service
{
    protected $manyToManyRelations = [];

    private $repository;

    public function __construct(Repository $repository)
    {

        $this->repository = $repository;
    }

    public function getModel(array $attributes, $id): ?Model
    {
        return $this->repository->get($id, $attributes);
    }

    public function getAll(array $relation = [])
    {
        return $this->repository->getAll($relation);
    }

    public function createNewModel(array $attributes): ?Model
    {
        $model = null;
        try{
            DB::transaction(function () use ($attributes, &$model){
                $model = $this->repository->create($attributes);
                foreach($this->manyToManyRelations as $relation){
                    if(method_exists($model, $relation) && array_key_exists($relation, $attributes)){
                        $this->repository->syncModel($attributes, $relation, $model);
                    }
                }
            });
        }
        catch (\Exception $e){
            return null;
        }
        return $model;
    }

    public function updateModel(array $attributes, $id): bool
    {
        $state = false;
        try{
            DB::transaction(function () use ($attributes, $id, &$state){
                $model = $this->repository->find($id);
                $state = $this->repository->update($attributes, $model);
                foreach($this->manyToManyRelations as $relation){
                    if(method_exists($model, $relation) && array_key_exists($relation, $attributes)){
                        $this->repository->syncModel($attributes, $relation, $model);
                    }
                }
            });
            return $state;
        }catch (\Exception $e){
            return false;
        }
    }

    public function deleteModel($id): bool
    {
        return $this->repository->delete($id);
    }

    public function count(): int
    {
        return $this->repository->count();
    }

    public function getRepository(): Repository
    {
        return $this->repository;
    }


    public function getBetween($needle, $from, $to, array $relations = [])
    {
        return $this->repository->getBetween($needle, $from, $to, $relations);
    }

    public function getBy(array $needles, array $values, array $relations = [])
    {
        if (count($needles) != count($values)) {
            return null;
        }
        $conditions = [];
        $index = 0;
        foreach ($needles as $needle) {
            $condition[] = $needle;
            $condition[] = '=';
            $condition[] = $values[$index];
            array_push($conditions, $condition);
            $condition = [];
            $index++;
        }

        return $this->repository->getBy($conditions, $relations);
    }
}