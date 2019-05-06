<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 8:52 PM
 */

namespace App\Http\Controllers\Requests\API\Comment;


use App\Http\Controllers\Requests\API\PatchRequest;

class CommentPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if ($this->route('id')) {
            return [
                'user_id' => 'int|exists:users,id',
                'product_id' => 'int|exists:products,id',
                'content' => 'string'
            ];
        }
        return [
            '*.id' => 'int|required|exists:comments,id',
            '*.user_id' => 'int|exists:users,id',
            '*.product_id' => 'int|exists:products,id',
            '*.content' => 'string'
        ];
    }
}
