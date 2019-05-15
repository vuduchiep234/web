<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/24/2019
 * Time: 9:22 AM
 */

namespace App\Models\File;


use Illuminate\Http\UploadedFile;

class FileReader implements Readable
{

    private $name;
    private $tmpName;
    private $renameChecker;
    private $fileURL;
    private $uploadedFile;

    private static $STORAGE_SUB_PATH = 'app';

    public function __construct(UploadedFile $uploadedFile = null)
    {
        $this->uploadedFile = $uploadedFile;
        $this->name = null;
        $this->tmpName = null;
        $this->renameChecker = false;
        $this->fileURL = null;
    }

    public function renameFile(string $name)
    {
        $this->tmpName = $name;
        $this->renameChecker = true;
    }

    public function storeFile(string $path): bool
    {
        if ($this->renameChecker) {
            $checker = $this->uploadedFile->storeAs($path, $this->tmpName);
            $this->fileURL = storage_path(self::$STORAGE_SUB_PATH).$path.$this->tmpName;
            $this->renameChecker = false;
        } else {
            $checker = $this->uploadedFile->storeAs($path, $this->name);
            $this->fileURL = storage_path(self::$STORAGE_SUB_PATH).$path.$this->name;
        }
        return $checker;
    }

    public function setUploadedFile(UploadedFile $file)
    {
        $this->uploadedFile = $file;
        $this->name = $file->getClientOriginalName();
    }

    public function getFileURL(): string
    {
        return $this->fileURL;
    }

    public function deleteFile(): bool
    {
        if ($this->fileURL != null) {
            return unlink($this->fileURL);
        }
        return false;
    }

    public function getFileName(): string
    {
        return $this->name;
    }
}