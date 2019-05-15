<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/25/2019
 * Time: 11:18 PM
 */

namespace App\Handlers\ImageHandler\File;


use App\Handlers\HandlerResponse\HandlerResponse;

class UploadImageHandler extends ImageFileHandler
{
    private static $DEFAULT_IMAGE_NAME = 'untiled';
    public function handle(array &$attributes): HandlerResponse
    {
        $fileService = $this->createHandlerFileService();
        $fileService->setUploadedFile($attributes['file']);

        $imageURL = $fileService->storageFile($this->createUploadPath());
        $attributes['image_url'] = $imageURL;
        if (!isset($attributes['image_name'])) {
            $attributes['image_name'] = self::$DEFAULT_IMAGE_NAME;
        }
        return parent::handle($attributes);
    }

    private function createUploadPath(): string
    {
        return '/public/images/';
    }
}