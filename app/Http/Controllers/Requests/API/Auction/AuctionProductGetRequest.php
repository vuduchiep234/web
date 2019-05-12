<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:50 PM
 */

namespace App\Http\Controllers\Requests\API\Auction;



use Illuminate\Support\Facades\Input;

class AuctionProductGetRequest extends AuctionGetRequest
{
    protected function filterRules(): array
    {
        return array_merge(parent::filterRules(), [
            'productId' => 'int|required|exists:products,id',
            'auction_id' => 'int|required|exists:auctions,id',
        ]);
    }

    public function getProductId(): int
    {
        return Input::get('productId');
    }

    public function getAuctionId(): int
    {
        return Input::get('productId');
    }
}