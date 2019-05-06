<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:29 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\API\PatchRequest;

class RolePatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if($this->route('id')){
            return [
                'type' => 'string',
            ];
        }
        return [
            '*.id' => 'int|exists:roles,id',
            '*.type'=> 'string|unique:roles,type|distinct',
        ];
    }
}