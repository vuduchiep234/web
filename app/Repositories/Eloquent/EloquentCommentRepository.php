<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/18/2018
 * Time: 5:48 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Comment;
use App\Repositories\CommentRepository;

class EloquentCommentRepository extends EloquentRepository implements CommentRepository
{
    public function __construct()
    {
        parent::__construct(Comment::query());
    }
}