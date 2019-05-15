<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:14 AM
 */

namespace App\Models\File;


use Illuminate\Http\UploadedFile;

interface Readable
{
    public function setUploadedFile(UploadedFile $file);

    public function renameFile(string $name);

    public function storeFile(string $path): bool;

    public function deleteFile() : bool;

    public function getFileURL(): string;
}