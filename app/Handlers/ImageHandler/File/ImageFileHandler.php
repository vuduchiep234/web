<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/25/2019
 * Time: 11:00 PM
 */

namespace App\Handlers\ImageHandler\File;


use App\Handlers\BaseFileHandler;
use App\Services\File\FileService;
use App\Services\File\Implementations\ImageFileService;

class ImageFileHandler extends BaseFileHandler
{

    public function createHandlerFileService(): FileService
    {
        return new ImageFileService();
    }
}