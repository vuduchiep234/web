<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:39 AM
 */

namespace App\Services\File;


use App\Repositories\File\FileRepository;
use Illuminate\Http\UploadedFile;

abstract class BaseFileService implements FileService
{
    private $fileRepository;

    public function __construct()
    {
        $this->fileRepository = $this->createFileRepository();
    }

    abstract public function createFileRepository(): FileRepository;

    public function setUploadedFile(UploadedFile $uploadedFile)
    {
        $this->fileRepository->setUploadedFile($uploadedFile);
    }

    public function checkType(): bool
    {
        //set uploaded file before check type
        $uploadedFileMimeType = $this->fileRepository->getUploadedFileMimeType();
        $originalFileMimeType = $this->fileRepository->getFileMimeTypes();

        if (in_array($uploadedFileMimeType, $originalFileMimeType)) {
            return true;
        }
        return false;
    }

    public function download(array $attributes): ?array
    {
        return null;
    }

    public function checkSize(int $allowedByteNumber): bool
    {
        $fileSize = $this->fileRepository->getFileSize();
        if ($fileSize <= $allowedByteNumber) {
            return true;
        }
        return false;
    }

    public function storageFile(string $path): ?string
    {
        if ($this->fileRepository->store($path)) {
            return $this->fileRepository->getFileURL();
        }
        return 'null';
    }

    public function deleteFile(): bool
    {
        return $this->fileRepository->delete();
    }

    public function renameFile(string $newName)
    {
        $fileExtension = $this->fileRepository->getFileExtension();
        $newName .= '.'.$fileExtension;
        $this->fileRepository->rename($newName);
    }

    public function getFileName(): string
    {
        return $this->fileRepository->getFileName();
    }
}