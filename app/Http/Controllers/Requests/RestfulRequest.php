<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/7/2018
 * Time: 6:21 PM
 */

namespace App\Http\Controllers\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RestfulRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(["Error" => $validator->errors()], 400));
    }

    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json(['Error' => 'This request is not authorized'], 403));
    }
}