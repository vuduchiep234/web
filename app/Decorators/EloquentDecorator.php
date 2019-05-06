<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/8/2018
 * Time: 11:20 AM
 */

namespace App\Decorators;


use App\Repositories\Repository;
use App\Services\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Base class for decorator classes (Enhance the get, create, update, delete models through multiple database tables)
 * We have a service variable (a variable that handles get, create, update, delete models logic), and add more behavior
 * to those service's logic in subclasses.
 * Class EloquentDecorator
 * @package App\Decorators
 */
class EloquentDecorator implements Service, Message
{
    use HandleMessage;
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function createNewModel(array $attributes): ?Model
    {
        return $this->service->createNewModel($attributes);
    }

    public function updateModel(array $attributes, $id): bool
    {
        return $this->service->updateModel($attributes, $id);
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

    public function getService(): Service
    {
        return $this->service;
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
}