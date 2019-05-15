<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/25/2019
 * Time: 10:54 PM
 */

namespace App\Handlers\ImageHandler\File;


use App\Handlers\HandlerResponse\HandlerResponse;

class CheckImageTypeHandler extends ImageFileHandler
{
    private static $INVALID_IMAGE_ERROR = 'Uploaded image type is not allowed';
    public function handle(array &$attributes): HandlerResponse
    {
        $uploadedImage = $attributes['file'];
        $imageFileService = $this->createHandlerFileService();

        $imageFileService->setUploadedFile($uploadedImage);

        if ($imageFileService->checkType()) {
            return parent::handle($attributes);
        }
        return $this->createHandlerResponse(self::$INVALID_IMAGE_ERROR, false);
    }
}