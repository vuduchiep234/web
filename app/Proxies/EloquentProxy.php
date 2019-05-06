<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/2018
 * Time: 11:48 AM
 */

namespace App\Proxies;


use App\Repositories\Repository;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

/**
 * Base proxy class for controlling access to service
 * Class EloquentProxy
 * @package App\Proxies
 */
abstract class EloquentProxy implements Service
{
    private $service;

    public function __construct(Service $decorator)
    {
        $this->service = $decorator;
    }

    public function createNewModel(array $attributes): ?Model
    {
        if($this->checkCreate($attributes)){
            return $this->service->createNewModel($attributes);
        }
        return null;
    }

    public function updateModel(array $attributes, $id): bool
    {
        if($this->checkUpdate($attributes, $id)){
            return $this->service->updateModel($attributes, $id);
        }
        return false;
    }

    public function deleteModel($id): bool
    {
        return $this->service->deleteModel($id);
    }

    public function getModel(array $attributes, $id): ?Model
    {
        return $this->service->getModel($attributes, $id);
    }

    public function count(): int
    {
        return $this->service->count();
    }

    public function getRepository(): Repository
    {
        return $this->service->getRepository();
    }

    public function getAll(array $relation = [])
    {
        return $this->service->getAll($relation);
    }

    public function getBetween($needle, $from, $to, array $relations = [])
    {
        return $this->service->getBetween($needle, $from, $to, $relations);
    }


    public function getBy(array  $needle,array $value, array $relations = [])
    {
        return $this->service->getBy($needle, $value, $relations);
    }
    /**
     * Check method for updating
     * @param array $attributes
     * @param $id
     * @return bool
     */
    abstract function checkUpdate(array $attributes, $id): bool;

    /**
     * Check method for creating
     * @param array $attributes
     * @return bool
     */
    abstract function checkCreate(array $attributes): bool;
}