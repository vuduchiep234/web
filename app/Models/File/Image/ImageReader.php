<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:24 AM
 */

namespace App\Models\File\Image;


use App\Models\File\FileReader;

class ImageReader extends FileReader
{
    public function getFileURL(): string
    {
        $fileName = parent::getFileName();
        return '/storage/images/'.$fileName;
    }
}