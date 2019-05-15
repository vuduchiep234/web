<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/15/2019
 * Time: 2:39 PM
 */

namespace App\Handlers;


use App\Services\File\FileService;

abstract class BaseFileHandler extends BaseHandler
{
    abstract public function createHandlerFileService(): FileService;
}