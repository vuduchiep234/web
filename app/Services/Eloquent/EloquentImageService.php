<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:57 PM
 */

namespace App\Services\Eloquent;

use App\Repositories\ImageRepository;
use App\Services\ImageService;

class EloquentImageService extends EloquentService implements ImageService
{
    public function __construct(ImageRepository $repository)
    {
        parent::__construct($repository);
    }
}