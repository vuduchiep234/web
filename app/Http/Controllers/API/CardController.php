<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:47 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Card\CardGetRequest;
use App\Http\Controllers\Requests\API\Card\CardPatchRequest;
use App\Http\Controllers\Requests\API\Card\CardPostRequest;
use App\Services\CardService;

class CardController extends APIController
{
    public function __construct(CardService $service)
    {
        parent::__construct($service);
    }

    public function get(CardGetRequest $request, $id)
    {
        return parent::_get($request, $id);
    }

    public function post(CardPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(CardPatchRequest $request, $id)
    {
        return parent::_patch($request, $id);
    }

    public function delete($id)
    {
        return parent::_delete($id);
    }
}