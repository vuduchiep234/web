<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/15/2019
 * Time: 4:37 PM
 */

namespace App\Handlers\ImageHandler\Eloquent;


use App\Handlers\HandlerResponse\HandlerResponse;

class CreateImageHandler extends EloquentImageHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('image_url', $attributes)) {
            return parent::handle($attributes);
        }
        $imageService = $this->createHandlerService();
        $imageAttributes['image_url'] = $attributes['image_url'];
        if (isset($attributes['image_name'])) {
            $imageAttributes['image_name'] = $attributes['image_name'];
        }
        $image = $imageService->createNewModel($imageAttributes);

        unset($attributes['image_url']);
        unset($attributes['image_name']);

        if ($image == null) {
            return $this->createHandlerResponse('Create image failed in database', false);
        }
        $attributes['image_id'] = $image['id'];

        return parent::handle($attributes);
    }
}