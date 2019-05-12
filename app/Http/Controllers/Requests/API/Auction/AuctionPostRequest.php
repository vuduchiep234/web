<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 1:37 PM
 */

namespace App\Http\Controllers\Requests\API\Auction;


use App\Http\Controllers\Requests\API\PostRequest;

class AuctionPostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            '*.duration' => 'date_format:H:i:s|min:0|required',
            '*.creator_id' => 'int|required|exists:users,id'
        ];
    }
}