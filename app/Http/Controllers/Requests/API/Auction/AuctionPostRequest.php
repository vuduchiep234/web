<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:30 PM
 */

namespace App\Http\Controllers\Requests\API\Auction;


use App\Http\Controllers\Requests\API\PostRequest;

class AuctionPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            '*.user_id' => 'int|required|exists:users,id',
            '*.product_id' => 'int|required|exists:products,id',
            '*.offer' => 'int|required|min:0',
        ];
    }
}