<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:38 AM
 */

namespace App\Services\File;


use Illuminate\Http\UploadedFile;

interface FileService
{
    public function setUploadedFile(UploadedFile $uploadedFile);

    public function download(array $attributes): ?array;

    public function checkType():bool;

    public function checkSize(int $allowedByteNumber): bool;

    public function renameFile(string $newName);

    public function storageFile(string $path):?string;

    public function deleteFile(): bool;

    public function getFileName(): string;
}