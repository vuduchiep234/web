<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:32 AM
 */

namespace App\Repositories\File;


use Illuminate\Http\UploadedFile;

interface FileRepository
{
    public function rename(string $renameString);

    public function store(string $path) : bool;

    public function delete(): bool;

    public function getFileName(): ?string;

    public function getFileExtension(): ?string;

    public function getFileMimeTypes(): array;

    public function getUploadedFileMimeType(): ?string;

    public function getFileSize(): int;

    public function setUploadedFile(UploadedFile $uploadedFile);

    public function getFileURL(): string;
}