<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:30 AM
 */

namespace App\Repositories\File;


use App\Models\File\File;
use App\Models\File\Readable;
use Illuminate\Http\UploadedFile;

abstract class BaseFileRepository implements FileRepository
{
    private $file;
    private $fileReader;

    public function __construct()
    {
        $this->file = $this->createUploadedFile();
        $this->fileReader = $this->createFileReader();
    }

    abstract public function createUploadedFile(): File;

    abstract public function createFileReader(): Readable;

    public function setUploadedFile(UploadedFile $uploadedFile)
    {
        $this->file->setUploadedFile($uploadedFile);
        $this->fileReader->setUploadedFile($uploadedFile);
    }

    public function rename(string $renameString)
    {
        $this->fileReader->renameFile($renameString);
    }

    public function store(string $path): bool
    {
        return $this->fileReader->storeFile($path);
    }

    public function delete(): bool
    {
        return $this->fileReader->deleteFile();
    }

    public function getFileURL(): string
    {
        return $this->fileReader->getFileURL();
    }

    public function getFileName(): ?string
    {
        $originalFileName = $this->file->getUploadedFileName();
        $fileNamePart = $this->split($originalFileName);
        return $fileNamePart[0];
    }

    public function getFileExtension(): ?string
    {
        $originalFileName = $this->file->getUploadedFileName();
        $fileNamePart = $this->split($originalFileName);
        return $fileNamePart[1];
    }

    public function getFileMimeTypes(): array
    {
        return $this->file->getOriginalMimeType();
    }

    public function getUploadedFileMimeType(): ?string
    {
        return $this->file->getUploadedMimeType();
    }

    public function getFileSize(): int
    {
        return $this->file->getUploadedFileSize();
    }

    private function split(string $string) :array
    {
        $parts = explode('.', $string);
        return $parts;
    }
}