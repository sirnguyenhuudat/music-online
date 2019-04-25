<?php
namespace App\Repositories\Comment;

use App\Repositories\EloquentRepository;
use App\Models\Comment;

class CommentEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Comment::class;
    }
}
