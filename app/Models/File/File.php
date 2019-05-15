<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:22 AM
 */

namespace App\Models\File;


use Illuminate\Http\UploadedFile;

abstract class File
{
    private $uploadedFile;

    public function __construct(UploadedFile $uploadedFile = null)
    {
        $this->uploadedFile = $uploadedFile;
    }

    abstract public function createOriginalMimeType(): array;

    public function getOriginalMimeType(): array
    {
        return $this->createOriginalMimeType();
    }

    public function getUploadedFileName(): ?string
    {
        return $this->uploadedFile->getClientOriginalName();
    }

    public function getUploadedMimeType(): ?string
    {
        return $this->uploadedFile->getMimeType();
    }

    public function getUploadedFileSize(): int
    {
        return $this->uploadedFile->getSize();
    }

    public function setUploadedFile(UploadedFile $file)
    {
        $this->uploadedFile = $file;
    }
}