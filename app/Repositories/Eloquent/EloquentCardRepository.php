<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:45 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Card;
use App\Repositories\CardRepository;

class EloquentCardRepository extends EloquentRepository implements CardRepository
{
    public function __construct()
    {
        parent::__construct(Card::query());
    }
}