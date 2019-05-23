<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/12/2019
 * Time: 3:45 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\CardRepository;
use App\Services\CardService;

class EloquentCardService extends EloquentService implements CardService
{
    public function __construct(CardRepository $repository)
    {
        parent::__construct($repository);
    }
}