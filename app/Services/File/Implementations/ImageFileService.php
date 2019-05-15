<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:41 AM
 */

namespace App\Services\File\Implementations;


use App\Repositories\File\FileRepository;
use App\Repositories\File\Implementations\ImageFileRepository;
use App\Services\File\BaseFileService;

class ImageFileService extends BaseFileService
{

    public function createFileRepository(): FileRepository
    {
        return new ImageFileRepository();
    }
}