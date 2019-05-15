<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:35 AM
 */

namespace App\Repositories\File\Implementations;


use App\Models\File\File;
use App\Models\File\Image\ImageFile;
use App\Models\File\Image\ImageReader;
use App\Models\File\Readable;
use App\Repositories\File\BaseFileRepository;

class ImageFileRepository extends BaseFileRepository
{

    public function createUploadedFile(): File
    {
        return new ImageFile();
    }

    public function createFileReader(): Readable
    {
        return new ImageReader();
    }
}