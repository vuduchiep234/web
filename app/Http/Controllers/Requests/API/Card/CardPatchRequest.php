<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:52 PM
 */

namespace App\Http\Controllers\Requests\API\Card;


use App\Http\Controllers\Requests\API\PatchRequest;

class CardPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if($this->route('id')){
            return [
                'name' => 'string',
                'phone' => 'string|unique:cards,phone',
                'role' => 'int|exists:roles,id',
                'address' => 'string|required',
                'avatar_id' => 'url',
            ];
        }
        return [
            '*.id' => 'int|exists:users,id',
            '*.name' => 'string',
            '*.phone'=> 'string|unique:cards,phone|distinct',
            '*.address' => 'string|required',
            '*.avatar_id' => 'url',
        ];
    }
}