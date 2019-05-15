<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/27/2018
 * Time: 9:33 PM
 */

namespace App\Decorators\CreateProduct\Eloquent;


use App\Decorators\CreateProduct\CreateProductDecorator;
use App\Decorators\EloquentDecorator;
use App\Handlers\ImageHandler\Eloquent\CreateImageHandler;
use App\Handlers\ImageHandler\File\UploadImageHandler;
use App\Repositories\ProductRepository;
use App\Services\Eloquent\EloquentService;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * Subclass for enhancing create new Product
 * Class EloquentCreateProductDecorator
 * @package App\Decorators\CreateProduct\Eloquent
 */
class EloquentCreateProductDecorator extends EloquentDecorator implements CreateProductDecorator
{
    public function __construct(ProductService $productService)
    {
        parent::__construct($productService);
    }

    public function createNewModel(array $attributes): ?Model
    {
        if (!array_key_exists('image_id', $attributes)) {
            $uploadImageHandler = new UploadImageHandler();
            $createImageHandler = new CreateImageHandler();

            $uploadImageHandler->setNextHandler($createImageHandler);
            $uploadImageHandler->handle($attributes);
        }

        return parent::createNewModel($attributes);
    }
}