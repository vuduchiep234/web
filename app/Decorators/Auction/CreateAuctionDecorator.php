<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:08 PM
 */

namespace App\Decorators\Auction;

use App\Handlers\ProductHandlers\CheckProductTimeHandler;
use Illuminate\Database\Eloquent\Model;


class CreateAuctionDecorator extends EloquentAuctionDecorator
{
    public function createNewModel(array $attributes): ?Model
    {
        $timeHandler = new CheckProductTimeHandler();
        $response = $timeHandler->handle($attributes);

        if ($response->getResponseStatus() == true) {
            return parent::createNewModel($attributes);
        } else {
            $this->setMessage($response->getResponseMessage());
            return null;
        }
    }}