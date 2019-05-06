<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 6:05 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\CommentRepository;
use App\Services\CommentService;

class EloquentCommentService extends EloquentService implements CommentService
{
    public function __construct(CommentRepository $repository)
    {
        parent::__construct($repository);
    }
}