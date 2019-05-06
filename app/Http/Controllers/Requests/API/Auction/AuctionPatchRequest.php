<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:32 PM
 */

namespace App\Http\Controllers\Requests\API\Auction;


use App\Http\Controllers\Requests\API\PatchRequest;

class AuctionPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'offer' => 'int|min:0',
        ];
    }
}