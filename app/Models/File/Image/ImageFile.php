<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:23 AM
 */

namespace App\Models\File\Image;


use App\Models\File\File;

class ImageFile extends File
{

    public function createOriginalMimeType(): array
    {
        return ['image/png'];
    }
}