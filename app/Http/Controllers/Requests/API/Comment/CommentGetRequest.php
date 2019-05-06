<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:47 PM
 */

namespace App\Http\Controllers\Requests\API\Comment;


use App\Http\Controllers\Requests\API\GetRequest;

class CommentGetRequest extends GetRequest
{

    protected function relations(): array
    {
        return ['user', 'product'];
    }

    protected function sort(): array
    {
        return ['id', 'user_id', 'product_id', 'day_created'];
    }

    protected function filterRules(): array
    {
        return [];
    }
}