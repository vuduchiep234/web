<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:38 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Image;
use App\Repositories\ImageRepository;

class EloquentImageRepository extends EloquentRepository implements ImageRepository
{
    public function __construct()
    {
        parent::__construct(Image::query());
    }
}