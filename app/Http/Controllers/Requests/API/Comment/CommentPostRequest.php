<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:48 PM
 */

namespace App\Http\Controllers\Requests\API\Comment;


use App\Http\Controllers\Requests\API\PostRequest;

class CommentPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.user_id' => 'int|required|exists:users,id',
            '*.product_id' => 'int|required|exists:products,id',
            '*.content' => 'string|required'
        ];
    }
}